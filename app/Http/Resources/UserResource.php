<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'dateBirthday' => $this->date_of_birth !== null ? Carbon::parse($this->date_of_birth)->format('d.m.Y') : null,
            'email' => $this->email,
            'phone' => $this->phone,
            'roles' => $this->roles
        ];
    }
}
