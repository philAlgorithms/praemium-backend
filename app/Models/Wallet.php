<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory;

    public function coin(): BelongsTo
    {
        return $this->belongsTo(Coin::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
