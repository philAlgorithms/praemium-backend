<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class Client extends User
{
    protected $table =  "users";
    

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'client_id');
    }

    public function deposits()
    {
        $deposit_ids = $this->transactions()->whereHasMorph('transactionable', [Deposit::class])->pluck('transactionable_id')->toArray();

        return Deposit::wherein('id', $deposit_ids);
    }

    public function withdrawals()
    {
        $withdrawal_ids = $this->transactions()->whereHasMorph('transactionable', [Withdrawal::class])->pluck('transactionable_id')->toArray();

        return Withdrawal::wherein('id', $withdrawal_ids);
    }

    public function bonuses()
    {
        $bonus_ids = $this->transactions()->whereHasMorph('transactionable', [Bonus::class])->pluck('transactionable_id')->toArray();

        return Bonus::wherein('id', $bonus_ids);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    public function referralPayment()
    {
        return ReferralEarning::whereRelation('deposit', function($que){
            $que->whereRelation('transaction', function($q){
                $q->where('client_id', $this->id);
            });
        })->first();
    }

    public function referralEarnings()
    {
        $earning_ids = $this->transactions()->whereHasMorph('transactionable', [ReferralEarning::class])->pluck('transactionable_id')->toArray();
        return ReferralEarning::wherein('id', $earning_ids);
    }

    public function transactionHasStatus(Status|string $status): HasMany
    {
        if ($status === '*')
            return $this->transactions();
        try {
            $status = $status instanceof Status ? $status : Status::firstWhere('key', $status);

            $key = is_null($status) ? "" : $status->key;
        } catch (ModelNotFoundException $exception) {
            $exception->getMessage();
            exit(403);
        }

        return $this->transactions()->whereRelation('status', 'key', $key);
    }

    public function getHasPaidReferrerAttribute()
    {
        $referrer = $this->referrer;
        if(is_null($referrer)) return true;
        $payment = $this->referralPayment();
        
        return is_null($payment) ? false : true;
    }

    // DEPOSIT START

    public function depositTransactions(): HasMany
    {
        return $this->transactions()->whereHasMorph('transactionable', [Deposit::class]);
    }

    public function depositTransactionHasStatus(Status|string $status): HasMany
    {
        return $this->transactionHasStatus($status)->whereHasMorph('transactionable', [Deposit::class]);
    }

    public function subscribe(Plan $plan, float $amount, Coin $coin)
    {
        $amount = abs($amount);
        $deposit = Deposit::create(['plan_id' => $plan->id]);

        $transaction = $this->transactions()->create([
            'amount'=> $amount,
            'transactionable_id' => $deposit->id,
            'transactionable_type' => 'App\Models\Deposit',
            'status_id' => Status::firstWhere('key', env('STATUS_PENDING'))->id,
            'coin_id' => $coin->id
        ]);

        return $transaction;
    }

    public function completeSubscription(string $tx, string|null $receiver_address, string|null $sender_address)
    {
        $status = $this->status;

        switch($status->key)
        {
            case env('STATUS_SUCCESSFUL'):
                return new Exception("Deposit already approved", 503);
                break;
            case env('STATUS_PROCESSING'):
                return new Exception("Subscription already complete. Deposit waiting to be approved", 503);
                break;
            case env('STATUS_DECLINED'):
                return new Exception("Deposit was previously declined", 503);
                break;
            default:
                break;
        }

        return $this->updateDeposit(receiver_address: $receiver_address, sender_address: $sender_address, tx: $tx, status_id:  Status::firstWhere('key', env('STATUS_PROCESSING'))->id);
    }

    /**
     * Check if deposit exists
     * @param id
     * 
     * @return Boolean
     */
    public function depositExists($id)
    {
        return $this->transactions()->whereHasMorph('transactionable', [Deposit::class], 
            function($query) use ($id)
            {
                $query->where('id', $id);
            }
        )->count > 0;
    }
    // DEPOSIT END

    // SUBSCRIPTION START
    public function subscriptions(Plan|string $plan='*', Status|string $status='*')
    {
        $plan_id = $plan instanceof Plan ? $plan->id : $plan;
        return $this->transactionHasStatus($status)
                    ->whereRelation('transactionable', function($query) use ($plan_id) {
                        $plan_id === '*' ? $query : $query->whereRelation('plan', 'id', $plan_id);
                    })->with('transactionable');
    }

    public function planEarnings()
    {
        return PlanEarning::whereRelation('deposit', function($query){
                        $query->whereRelation('transaction', function($q)
                        {
                            $q->where('client_id', $this->id);
                        });
                    });
    }

    public function planInterests()
    {
        return $this->planEarnings()->where('index', '!=', 0);
    }

    public function duePayments()
    {
        $now = (new \Datetime())->format('Y-m-d H:i:s');
        return $this->planEarnings()->where('earned', 0)
                                    ->where('pay_date', '<', $now);
    }

    public function earnedSubscriptions()
    {
        return $this->planEarnings()->where('earned', 1);
    }

    public function completedEarnedSubscriptions()
    {
        return $this->earnedSubscriptions()
                    ->whereRelation('deposit', function($query){
                        $query->where('earning_completed', 1);
                    });
    }

    public function completedEarningPrincipals()
    {
        return $this->completedEarnedSubscriptions()->where('index', 0);
    }

    public function earnedInterests()
    {
        return $this->earnedSubscriptions()->whereNot('index', 0);
    }

    public function activePlans()
    {
        $now = (new \Datetime())->format('Y-m-d H:i:s');
        $active_deposit_ids = $this->planEarnings()->where('earned', 0)->pluck('deposit_id')->toArray();
        return $this->deposits();
        // TO BE CONTINUED
    }
    
    // SUBSCRIPTION END

    // BONUS START
    public function bonusTransactions(): HasMany
    {
        return $this->transactions()->whereHasMorph('transactionable', [Bonus::class]);
    }

    public function grantBonus(float $amount, Plan $plan)
    {
        $amount = abs($amount);
        $bonus = $plan->bonuses()->create();

        $transaction = $this->transactions()->create([
            'amount'=> $amount,
            'transactionable_id' => $bonus->id,
            'transactionable_type' => 'App\Models\Bonus',
            'status_id' => Status::firstWhere('key', env('STATUS_SUCCESSFUL'))->id
        ]);

        return $transaction;
    }
    // BONUS END

    // WITHDRAWAL START

    public function withdrawalTransactions(): HasMany
    {
        return $this->transactions()->whereHasMorph('transactionable', [Withdrawal::class]);
    }

    
    public function withdrawalTransactionHasStatus(Status|string $status): HasMany
    {
        return $this->transactionHasStatus($status)->whereHasMorph('transactionable', [Withdrawal::class]);
    }

    public function submitWithdrawal(float $amount, string $receiver_address, Coin $coin, Plan $plan)
    {
        $amount = -1 * abs($amount);
        $withdrawal = $plan->withdrawals()->create();

        $transaction = $this->transactions()->create([
            'amount'=> $amount,
            'transactionable_id' => $withdrawal->id,
            'transactionable_type' => 'App\Models\Withdrawal',
            'status_id' => Status::firstWhere('key', env('STATUS_PENDING'))->id,
            'coin_id' => $coin->id,
            'receiver_address' => $receiver_address
        ]);

        return $transaction;
    }
    // WITHDRAWAL END

    // REFERRAL START

    public function referralEarningTransactions(): HasMany
    {
        return $this->transactions()->whereHasMorph('transactionable', [ReferralEarning::class]);
    }
    // REFERRAL END

    /**
     * CONCERNING FINANCE 
     */

    // DEPOSIT AND SUBSCRIPTION FINANCE START
    public function getTotalDepositsAttribute()
    {
        $succesful_deposits = $this->depositTransactionHasStatus(env('STATUS_SUCCESSFUL'));
        
        return array_sum($succesful_deposits->pluck('amount')->toArray());
    }

    public function getTotalPlanEarningsAttribute()
    {
        return array_sum($this->earnedSubscriptions()->pluck('amount')->toArray());
    }

    public function getTotalCompletedPlanEarningsAttribute()
    {
        return array_sum($this->completedEarnedSubscriptions()->pluck('amount')->toArray());
    }

    public function getTotalWithdrawablePlanEarningsAttribute()
    {
        $earned_interests_sum = array_sum($this->earnedInterests()->pluck('amount')->toArray());
        $completed_principals = array_sum($this->completedEarningPrincipals()->pluck('amount')->toArray());

        return $earned_interests_sum + $completed_principals;
    }

    public function getTotalWithdrawalsAttribute()
    {
        $succesful_withdrawals = $this->withdrawalTransactionHasStatus(env('STATUS_SUCCESSFUL'));
        
        return array_sum($succesful_withdrawals->pluck('amount')->toArray());
    }

    public function getTotalExpenditureAttribute()
    {
        return $this->total_withdrawals;
    }

    public function getTotalEarningsAttribute()
    {
        $total_plan_earnings = $this->total_plan_earnings;
        $total_referral_earnings = $this->total_referral_earnings;

        return $total_earnings = $total_plan_earnings + $total_referral_earnings;
    }

    public function getTotalCompletedEarningsAttribute()
    {
        $total_completed_plan_earnings = $this->total_completed_plan_earnings;
        $total_referral_earnings = $this->total_referral_earnings;

        return $total_earnings = $total_completed_plan_earnings + $total_referral_earnings;
    }
    
    public function getWithdrawableAmountAttribute()
    {
        $total_withdrawals = $this->total_withdrawals;
        $total_bonuses = $this->total_bonuses;
        $total_withdrawable_plan_earnings = $this->total_withdrawable_plan_earnings;

        return $total_withdrawable_plan_earnings + $total_bonuses + $total_withdrawals;
    }

    public function getTotalReferralEarningsAttribute()
    {
        $referral_earnings = $this->referralEarningTransactions();
        
        return array_sum($referral_earnings->pluck('amount')->toArray());
    }

    public function getTotalBonusesAttribute()
    {
        $bonuses = $this->bonusTransactions();
        
        return array_sum($bonuses->pluck('amount')->toArray());
    }
    // public function getActivePlanEarningsAttribute()
    // {
    //     return $active_plans = $this->activePlans;
    // }

    // DEPOSIT AND SUBSCRIPTION FINANCE END
}
