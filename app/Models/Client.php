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

class Client extends User
{
    protected $table =  "users";
    

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'client_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
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

    // DEPOSIT START

    public function depositTransactions(): HasMany
    {
        return $this->transactions()->whereHasMorph('transactionable', [Deposit::class]);
    }

    public function depositTransactionHasStatus(Status|string $status): HasMany
    {
        return $this->transactionHasStatus($status)->whereHasMorph('transactionable', [Deposit::class]);
    }


    public function subscribe(Plan $plan, float $amount)
    {
        $deposit = Deposit::create(['plan_id' => $plan->id]);

        $transaction = $this->transactions()->create([
            'amount'=> $amount,
            'transactionable_id' => $deposit->id,
            'transactionable_type' => 'App\Models\Deposit',
            'status_id' => Status::firstWhere('key', env('STATUS_PENDING'))->id
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
    public function duePayments()
    {
        $now = (new \Datetime())->format('Y-m-d H:i:s');
        return $this->planEarnings()->where('earned', 0)
                                    ->where('pay_date', '<', $now);
    }
    // SUBSCRIPTION END

    protected function getTotalDepositsAttribute()
    {
        return array_sum($this->depositTransactionHasStatus(env('STATUS_SUCCESSFUL'))->get(['amount'])->toArray());
    }
}
