<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TelegramController extends Controller
{
    private $recipients = ['markelovdn@gmail.com', 'kintexrus@list.ru'];

    public function handle(Request $request)
    {
        $message = $request->input('message');

        Log::info('Received message from Telegram:', $request->all());

        if ($message && $message['chat']['type'] === 'channel') {
            $text = $message['text'] ?? 'Текст сообщения отсутствует';
            $channelTitle = $message['chat']['title'] ?? 'Неизвестный канал';

            $subject = "Сообщение от канала: $channelTitle";

            foreach ($this->recipients as $recipient) {
                Mail::raw($text, function ($msg) use ($recipient, $subject) {
                    $msg->to($recipient)->subject($subject);
                });
            }

            return response()->json(['status' => 'Message sent to email']);
        }

        return response()->json(['status' => 'No valid message found'], 400);
    }
}
