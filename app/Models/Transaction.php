<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    use HasFactory;

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function updateDeposit(string $receiver_address, string|null $sender_address, string|null $tx, int|null $status_id)
    {
        $status_id = is_null($status_id) ? $this->status_id : $status_id;
        $sender_address = is_null($sender_address) === '' ? $this->sender_address : $sender_address;
        $tx = is_null($tx) ? $this->tx : $tx;

        $updated = $this->update([
            'status_id' => $status_id,
            'receiver_address' => $receiver_address,
            'sender_address' => $sender_address,
            'tx' => $tx
        ]);

        return $updated ? Transaction::find($this->id) : new Exception("Error updating transaction");
    }

    public function approveDeposit(string $receiver_address, string|null $sender_address, string|null $tx)
    {
        $status = $this->status;

        switch($status->key)
        {
            case env('STATUS_SUCCESSFUL'):
                return new Exception("Deposit already approved", 503);
                break;
            default:
                break;
        }

        $this->updateDeposit(receiver_address: $receiver_address, sender_address: $sender_address, tx: $tx, status_id:  Status::firstWhere('key', env('STATUS_SUCCESSFUL'))->id);
        $this->transactionable->generateEarnings();

        return Transaction::find($this->id);
    }

    
    public function setEarningDates(float|null $roi)
    {
        $plan = $this->transactionable->plan;
        $roi = is_null($roi) ? $this->transactionable->plan->roi : $roi;
    }
}
