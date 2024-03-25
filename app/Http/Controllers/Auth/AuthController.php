<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
