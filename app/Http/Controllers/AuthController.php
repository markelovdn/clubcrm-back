<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request, UserService $userService): JsonResponse
    {
        $userService->createUser($request->validated());
        return response()->json([
            'message' => __('apiResponseMessage.auth.register')
        ]);
    }

    public function login(LoginRequest $request): string
    {
        $token = $this->authService->login($request->validated());

        return response()->json(['token' => $token]);
    }

    public function authFromVk()
    {
        //     $client_id = 51858715; // ID приложения
        // $client_secret = 'N5VU9q4KhRPwosHYVeEw'; // Защищённый ключ
        // $redirect_uri = 'http://royera.ru/auth.php'; // Адрес сайта

        // $url = 'http://oauth.vk.com/authorize'; // Ссылка для авторизации на стороне ВК

        $params = [
            'client_id' => '51858715',
            'display' => 'mobile',
            'redirect_uri' => 'https://legion34.clubcrm.ru/api/handleVKCallback',
            'response_type' => 'code',
        ];

        return redirect('http://oauth.vk.com/authorize?' . http_build_query($params));
    }

    public function handleVKCallback(Request $request)
    {
        $code = $request->get('code');

        // $params = [
        //     'client_id' => '51858715',
        //     'client_secret' => 'a077f5dfa077f5dfa077f5df89a360b8c4aa077a077f5dfc5a754a22f2386f56bd58c64',
        //     'redirect_uri' => 'https://legion34.clubcrm.ru/api/handleVKCallback',
        //     'code' => $code,
        // ];

        // // Обмен кода на токен
        // $tokenRequest = file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params));
        // $tokenData = json_decode($tokenRequest, true);

        // $token = $tokenData['access_token'];
        // $vkUserId = $tokenData['user_id'];

        // // Получение информации о пользователе с использованием токена
        // $userDataRequest = file_get_contents('https://api.vk.com/method/users.get?user_id=' . $vkUserId . '&access_token=' . $token . '&v=5.131');
        // $userData = json_decode($userDataRequest, true);

        return $code;

        // Логика по созданию/аутентификации пользователя в Laravel
    }
}
