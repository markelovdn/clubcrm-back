<?php

namespace App\Services;

use App\Events\UserCreated;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
  public $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function createUser($data): User
  {
    $user = User::create([
      'email' => $data['email'],
      'phone' => $data['phone'],
      'password' => Hash::make($data['password']),
    ]);

    event(new UserCreated($user, $data));

    return $user;
  }
}
