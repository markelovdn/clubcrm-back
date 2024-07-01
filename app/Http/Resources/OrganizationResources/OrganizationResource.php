<?php

namespace App\Http\Resources\OrganizationResources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shortTitle' => $this->shorttitle,
            'verified' => $this->verified,
            'createdAt' => $this->created_at->format('d.m.Y H:i'),
        ];
    }
}
