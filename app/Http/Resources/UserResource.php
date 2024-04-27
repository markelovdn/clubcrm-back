<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstname,
            'secondName' => $this->secondname,
            'middleName' => $this->middlename,
            'email' => $this->email,
            'phone' => $this->phone,
            'token' => $this->token,
        ];
    }
}
