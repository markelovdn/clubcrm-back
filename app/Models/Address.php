<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'district_id',
        'region_id',
        'locality',
        'street',
        'house_number',
        'apartment_number',
        'post_index',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }
}
