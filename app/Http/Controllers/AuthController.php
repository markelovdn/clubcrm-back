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
            'redirect_uri' => 'https://clubcrm.ru/api/handleVKCallback',
            'response_type' => 'code',
        ];

        return redirect('http://oauth.vk.com/authorize?' . http_build_query($params));
    }

    public function handleVKCallback(Request $request)
    {
        if (!empty($_GET['code'])) {
            $params = array(
                'client_id'     => '51858715',
                'client_secret' => 'N5VU9q4KhRPwosHYVeEw',
                'redirect_uri'  => 'https://clubcrm.ru/api/handleVKCallback',
                'code'          => $_GET['code'],
                'scope' => 'email',
                'email'         => 1
            );
            // Получение access_token
            $data = file_get_contents('https://oauth.vk.com/access_token?' . urldecode(http_build_query($params)));
            $data = json_decode($data, true);
            if (!empty($data['access_token'])) {


                // Получим данные пользователя
                $params = array(
                    'v'            => '5.199',
                    'uids'         => $data['user_id'],
                    'access_token' => $data['access_token'],
                );

                // return $info = file_get_contents('https://api.vk.com/method/account.getProfileInfo?' . urldecode(http_build_query($params)));

                return $info = file_get_contents('https://api.vk.com/method/users.get?' . urldecode(http_build_query($params)));
            }
        }
    }
}
