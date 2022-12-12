<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Deposit extends Model
{
    use HasFactory;

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function client(): BelongsTo
    {
        return $this->transaction->client();
    }

    public function approve(string|null $receiver_address, string $sender_address, string|null $tx)
    {
        return $this->transaction->approveDeposit(receiver_address: $receiver_address, sender_address: $sender_address, tx: $tx);
    }

    public function completeSubscription(string $tx, string|null $receiver_address, string|null $sender_address)
    {
        $status = $this->transaction->status;

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

        return $this->transaction->updateDeposit(receiver_address: $receiver_address, sender_address: $sender_address, tx: $tx, status_id:  Status::firstWhere('key', env('STATUS_PROCESSING'))->id);
    }

    public function earnings(): HasMany
    {
        return $this->hasMany(PlanEarning::class, 'deposit_id');
    }

    public function generateEarnings(?float $roi=null): HasMany
    {
        $earning_intervals = $this->plan->get_intervals($this->transaction->amount, $roi);
        $roi = is_null($roi) ? $this->plan->roi : $roi;

        foreach($earning_intervals as $interval){
            $this->earnings()->create($interval);
        }

        return $this->earnings();
    }

    public function lastEarning()
    {
        return $this->earnings()->latest('pay_date');
    }

    public function getSubscriptionShouldBeCompletedAttribute()
    {
        return $this->earnings()->where('earned', 0)->get()->count() === 0;
    }

    public function markAsCompleted()
    {
        if($this->subscription_should_be_completed){
            return $this->update([
                'earning_completed' => 1
            ]);
        }
    }
}
