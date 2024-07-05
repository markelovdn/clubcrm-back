<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SetProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

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

    public function store(CreateUserRequest $request)
    {
        $response = $this->userService->createUser($request->validated());

        return $response;
    }

    public function show(int $id)
    {
        $user = $this->userService->userRepository->getOne($id);
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $this->userService->userRepository->getOne($request->get('id'));
        $this->authorize('update', $user);
        return $this->userService->updateUser($request->validated());
    }

    public function destroy(string $id)
    {
        return $this->userService->userRepository->deleteUser($id);
    }

    public function setProfile(SetProfileRequest $request)
    {
        return $this->userService->setProfile($request->validated());
    }
}
