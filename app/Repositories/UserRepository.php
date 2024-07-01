<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function getAll(): Collection
    {
        return User::with('roles')->get();
    }
    public function getOne($id): ?User
    {
        return User::with('roles')->findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create([
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
    }

    public function setProfile($data): User
    {
        $user = $this->getOne($data['id']);

        $user->firstname = $data['firstName'];
        $user->secondname = $data['secondName'];
        $user->middlename = $data['middleName'];
        $user->date_of_birth = $data['dateBirthday'];
        $user->save();

        $user->roles()->detach();
        $user->roles()->attach($data['rolesId']);

        return $user;
    }

    public function update($data): User
    {
        $user = $this->getOne($data['id']);

        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->firstname = $data['firstName'];
        $user->secondname = $data['secondName'];
        $user->middlename = $data['middleName'];
        $user->date_of_birth = $data['dateBirthday'];

        $user->save();

        return $user;
    }
}
