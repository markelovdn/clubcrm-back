<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserWelcomeEmail;

class SendWelcomeEmail
{
    public function handle(UserCreated $event)
    {
        Mail::to($event->user->email)->send(new NewUserWelcomeEmail($event->user, $event->password, $event->userData['subDomain']));
    }
}
