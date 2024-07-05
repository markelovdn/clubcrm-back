<?php

namespace App\Services;

use App\Events\UserCreated;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($data): array
    {
        DB::beginTransaction();
        try {
            $data['password'] = $this->generatePassword();
            $user = $this->userRepository->create($data);

            $organizationId = app(OrganizationService::class)->getOrganizationIdBySubdomain($data['subDomain']);
            $user->organizations()->attach($organizationId);

            $token = $user->createToken('api')->plainTextToken;

            DB::commit();

            event(new UserCreated($user, $data, $data['password']));

            return ['user' => new UserResource($user), 'token' => $token];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function setProfile($data): User
    {
        return $this->userRepository->setProfile($data);
    }

    public function updateUser($data): User
    {
        return $this->userRepository->update($data);
    }

    private function generatePassword(): string
    {
        $password = Str::random(8);
        return Hash::make($password);
    }
}
