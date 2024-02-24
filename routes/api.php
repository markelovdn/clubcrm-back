<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::get('/test', function () {
    return json_encode(['message' => 'Hello World!']);
});

Route::get('/authFromVK', [AuthController::class, 'authFromVK']);
Route::get('/handleVKCallback', function (Request $request) {
    if (!empty($_GET['code'])) {
        $params = array(
            'client_id'     => '51858715',
            'client_secret' => 'N5VU9q4KhRPwosHYVeEw',
            'redirect_uri'  => 'https://legion34.clubcrm.ru/api/handleVKCallback',
            'code'          => $_GET['code'],
            'scope' => 'email'
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
            // $info = file_get_contents('https://api.vk.com/method/account.getProfileInfo?' . urldecode(http_build_query($params)));

            // $info = file_get_contents('https://api.vk.com/method/users.get?' . urldecode(http_build_query($params)));
            return $data;
        }
    }
});

Route::get('/handleYandexCallback', function (Request $request) {
    return $request;
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
