<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    public function period(){
    	return $this->belongsTo(Period::class);
    }

    public function deposits(): HasMany
    {
    	return $this->hasMany(Deposit::class);
    }

    public function withdrawals(): HasMany
    {
    	return $this->hasMany(Withdrawal::class);
    }

    public function duration(){
    	return $this->belongsTo(Period::class);
    }

    public function duaration_span(){
	    return "1 ".$this->duration->singular;
    }

    public function periodic_span(){
	    return $this->intervals." ".$this->period->plural;
    }

    public function interval_seconds()
    {

    }
    public function get_intervals(float $amount, ?float $roi=null)
    {
        $intervals = [];
        $roi = is_null($roi) ? $this->roi : $roi;

        for($i = 0; $i <= $this->intervals; $i++)
        {
            array_push($intervals, [
                'index' => $i,
                'pay_date' => getNextDate('+'.$i." ".$this->period->plural),
                'amount' => $i === 0 ? $amount : amount_from_percent($amount, $roi),
                'roi' => (float)$roi,
                'earned' => $i === 0 ? 1 : 0,
            ]);
        }

        return $intervals;
    }

    public function approvedWithdrawals(Client $client)
    {
        return $client->withdrawalTransactionHasStatus(env('STATUS_SUCCESSFUL'))
                      ->whereHasMorph('transactionable', [Withdrawal::class], function($query){
                        $query->whereHas('plan', function($que){
                            $que->where('id', $this->id);
                        });
                      });
    }

    public function totalWithdrawals(Client $client)
    {
        $approved_withdrawals = $this->approvedWithdrawals($client);

        return array_sum($approved_withdrawals->pluck('amount')->toArray());
    }

    public function activeSubscriptions(Client $client)
    {
        return $client->planEarnings()->whereRelation('deposit', function($query){
            $query->where('earning_completed', 1)
                  ->whereRelation('plan', function($q){
                    $q->where('id', $this->id);
                });
        });
    }

    public function subscriptionEarning(Client $client)
    {
        $plan_subscriptions = $this->activeSubscriptions($client);

        return array_sum($plan_subscriptions->pluck('amount')->toArray());
    }

    public function totalReferralEarning(Client $client)
    {
        return 0.00;
    }

    public function activeEarning(Client $client)
    {
        return $this->subscriptionEarning($client) 
        + $this->totalReferralEarning($client)
        + $this->totalWithdrawals($client);
    }
}
