<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $userData;
    public $password;

    public function __construct(User $user, array $userData, string $password)
    {
        $this->user = $user;
        $this->userData = $userData;
        $this->password = $password;
    }
}
