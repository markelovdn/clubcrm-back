<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'second_name',
        'middle_name',
        'date_of_birth',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    public function isAdmin(): bool
    {
        return $this->roles->contains('code', Role::ADMIN);
    }

    public function isRoot(): bool
    {
        return $this->roles->contains('code', Role::ROOT);
    }
}
