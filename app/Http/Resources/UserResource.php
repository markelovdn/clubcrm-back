<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstname,
            'secondName' => $this->secondname,
            'middleName' => $this->middlename,
            'fullName' => $this->firstname . ' ' . $this->middlename . ' ' . $this->secondname,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
