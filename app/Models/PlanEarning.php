<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanEarning extends Model
{
    use HasFactory;

    public function deposit(): BelongsTo
    {
        return $this->belongsTo(Deposit::class);
    }

    public function markAsEarned()
    {
        return $this->update(['earned' => 1]);
    }
}
