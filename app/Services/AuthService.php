<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($credentials)
    {
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => __('apiResponseMessage.auth.loginFail'),
            ]);
        }

        $user = User::where('phone', $credentials['phone'])->first();
        $token = $user->createToken('api')->plainTextToken;

        return $token;
    }
}
