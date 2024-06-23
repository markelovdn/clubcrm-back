<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }

    public function coutry(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
