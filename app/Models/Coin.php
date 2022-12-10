<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coin extends Model
{
    use HasFactory;

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    public function users()
    {
        return User::whereRelation('wallets', function($query) {
            $query->where('coin_id', $this->id);
        });
    }
}
