<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReferralEarning extends Model
{
    use HasFactory;

    public function deposit(): BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }

    public function plan()
    {
        return $this->deposit->plan();
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
