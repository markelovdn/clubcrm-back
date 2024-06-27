<?php

namespace App\Services;

use App\Events\UserCreated;
use App\Http\Resources\UserResource;
use App\Mail\PasswordResetMail;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

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
            throw ValidationException::withMessages([
                'auth' => [__('apiResponseMessage.auth.loginFail')],
            ]);
        } else {
            $user = Auth::user();
            $token = $user->createToken('api')->plainTextToken;
            return ['user' => new UserResource($user), 'token' => $token];
        }
    }

    public function registration($data)
    {
        $password = Str::random(8);
        $data['password'] = Hash::make($password);
        $user = $this->userRepository->create($data);
        $token = $user->createToken('api')->plainTextToken;

        event(new UserCreated($user, $data, $password));

        return ['user' => new UserResource($user), 'token' => $token];
    }

    public function sendToken($data)
    {
        $token = Str::random(64);

        User::where('email', $data['email'])->get()->firstOrFail();
        DB::table('password_reset_tokens')->insert([
            'email' => $data['email'],
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($data['email'])->send(new PasswordResetMail($data['email'], $token));

        return response()->json('Data send success');
    }

    public function resetPassword($data)
    {
        $token = DB::table('password_reset_tokens')->where('token', $data['resetToken'])->first();

        $user = User::where('email', $token->email)->first();

        $user->password = Hash::make($data['password']);
        $user->save();

        DB::table('password_reset_tokens')->where(['token' => $data['resetToken']])->delete();

        return response()->json('Password updated success');
    }
}
