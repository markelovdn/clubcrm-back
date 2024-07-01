<?php

namespace App\Http\Resources\OrganizationResources;

use App\Http\Resources\AddressResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationFullResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shortTitle' => $this->shorttitle,
            'fullTitle' => $this->fulltitle,
            'regCode' => $this->reg_code,
            'domen' => $this->domen,
            'verified' => $this->verified,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i'),
            'addresses' => AddressResource::collection($this->addresses),
            'users' => UserResource::collection($this->users),
        ];
    }
}
