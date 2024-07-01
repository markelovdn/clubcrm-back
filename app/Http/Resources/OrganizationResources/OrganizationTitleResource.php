<?php

namespace App\Http\Resources\OrganizationResources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationTitleResource extends JsonResource
{
    public function toArray($request)
    {
        $title = $this->shorttitle;

        if ($this->relationLoaded('addresses') && !$this->addresses->isEmpty()) {
            $address = $this->addresses->first();

            if ($address->relationLoaded('region')) {
                $region = $address->region;
                $title .= " ({$region->title})";
            }
        }

        return [
            'id' => $this->id,
            'title' => $title,
        ];
    }
}
