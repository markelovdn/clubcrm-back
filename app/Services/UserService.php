<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function setProfile($data): User
    {
        return $this->userRepository->setProfile($data);
    }

    public function updateProfile($data): User
    {
        return $this->userRepository->update($data);
    }
}
