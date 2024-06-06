<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\Services\UserService;
use App\Services\VkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;
    protected $userService;

    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function register(RegisterUserRequest $request): array
    {
        $response = $this->authService->registration($request->validated());

        return $response;
    }

    public function login(LoginRequest $request): array
    {
        $response = $this->authService->login($request->validated());

        return $response;
    }

    public function user(): JsonResource
    {
        $user = $this->userService->userRepository->getOne(Auth::user()->id);
        return new UserResource($user);
    }

    public function sendToken(NewPasswordRequest $request)
    {
        return $this->authService->sendToken($request->validated());
    }

    public function resetPassword(UpdatePasswordRequest $request): JsonResponse
    {
        return $this->authService->resetPassword($request->validated());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => __('apiResponseMessage.auth.logout')]);
    }

    public function authFromVk(VkService $vkService)
    {
        return redirect($vkService->getAuthorizationUrl());
    }

    public function vkLogin(Request $request, VkService $vkService)
    {
        $data = $vkService->fetchAccessToken($request->code);
        if (!empty($data['access_token'])) {
            $userInfo = $vkService->getVkUserInfo($data['access_token'], $data['user_id']);
            return response()->json($userInfo);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
