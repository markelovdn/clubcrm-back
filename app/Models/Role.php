<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ROOT = 'root';
    public const ADMIN = 'admin';
    public const MANAGER = 'manager';
    public const COACH = 'coach';
    public const ATHLETE = 'athlete';
    public const REFEREE = 'referee';
    public const PARENTAD = 'parentad';
    public static $publicRoles = [Role::COACH, Role::ATHLETE, Role::REFEREE, Role::PARENTAD];


    public function users()
    {
        return $this->belongsToMany(User::class)->with('roles');
    }
}
