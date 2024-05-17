<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');

        if (isset($message['text'])) {
            $chatId = $message['chat']['id'];
            $text = $message['text'];

            Mail::raw($text, function ($msg) {
                $msg->to('markelovdn@gmail.com')->subject('Сообщение от СК Легион');
            });

            Mail::raw($text, function ($msg) {
                $msg->to('kintexrus@list.ru')->subject('Сообщение от СК Легион');
            });

            $responseText = 'Ваше сообщение было отправлено на email.';

            $this->sendMessage($chatId, $responseText);
        }

        return response()->json(['status' => 'ok']);
    }

    private function sendMessage($chatId, $text)
    {
        $url = "https://api.telegram.org/bot" . config('services.telegram_bot_token') . "/sendMessage";

        Http::post($url, [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}
