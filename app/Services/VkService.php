<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VkService
{
    private $clientId;
    private $redirectUri;
    private $clientSecret;

    public function __construct()
    {
        $this->clientId = config('auth.vk.client_id');
        $this->clientSecret = config('auth.vk.client_secret');
        $this->redirectUri = config('auth.vk.redirect_uri');
    }

    public function getAuthorizationUrl()
    {
        $params = [
            'client_id' => $this->clientId,
            'display' => 'mobile',
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
        ];

        return 'http://oauth.vk.com/authorize?' . http_build_query($params);
    }

    public function fetchAccessToken($code)
    {
        if (!empty($code)) {
            $params = [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => $this->redirectUri,
                'code' => $code,
            ];

            $response = Http::get('https://oauth.vk.com/access_token', $params);
            return $response->json();
        }

        return null;
    }

    public function getVkUserInfo($accessToken, $userId)
    {
        $params = [
            'v' => '5.199',
            'uids' => $userId,
            'access_token' => $accessToken,
        ];

        $response = Http::get('https://api.vk.com/method/users.get', $params);
        return $response->json();
    }
}
