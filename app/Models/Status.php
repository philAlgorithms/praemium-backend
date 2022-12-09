<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * Get the status key
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function key(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
        );
    }
}
