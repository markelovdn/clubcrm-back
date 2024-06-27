<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->userRepository->getAll();
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(int $id)
    {
        $user = $this->userService->userRepository->getOne($id);
        return new UserResource($user);
    }

    public function update(UpdateProfileRequest $request)
    {
        return $this->userService->updateProfile($request->validated());
    }

    public function destroy(string $id)
    {
        //
    }

    public function setProfile(SetProfileRequest $request)
    {
        return $this->userService->setProfile($request->validated());
    }
}
