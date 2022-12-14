<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Withdrawal extends Model
{
    use HasFactory;

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function client(): BelongsTo
    {
        return $this->transaction->client();
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function approve(string|null $receiver_address, string $sender_address, string|null $tx)
    {
        return $this->transaction->approveWithdrawal(receiver_address: $receiver_address, sender_address: $sender_address, tx: $tx);
    }
}
