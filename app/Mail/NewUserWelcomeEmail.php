<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NewUserWelcomeEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    private $user;
    private $password;
    private $subDomain;

    public function __construct(User $user, $password, $subDomain)
    {
        $this->user = $user;
        $this->password = $password;
        $this->subDomain = $subDomain;
    }

    public function build()
    {
        return $this->subject('Добро пожаловать в личный кабинет')
            ->markdown('emails.newUserWelcome')
            ->with([
                'email' => $this->user->email,
                'phone' => $this->user->phone,
                'password' => $this->password,
                'subDomain' => $this->subDomain,
            ]);
    }
}
