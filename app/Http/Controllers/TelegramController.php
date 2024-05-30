<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TelegramController extends Controller
{
    private $recipients = ['markelovdn@gmail.com', 'kintexrus@list.ru'];

    public function handle(Request $request)
    {
        $data = $request->all();
        $text = $data['channel_post']['text'];

        foreach ($this->recipients as $recipient) {

            Mail::raw($text, function ($message) use ($recipient) {
                $message->to($recipient)->subject('Сообщение от СК Легион важное');
            });
        }

        return response()->json(['message' => 'Email sent successfully']);
    }
}
