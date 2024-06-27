<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
