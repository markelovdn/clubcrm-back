<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'country' => [
                'id' => $this->country->id,
                'title' => $this->country->title,
            ],
            'region' => [
                'id' => $this->region->id,
                'title' => $this->region->title,
            ],
            'district' => [
                'id' => $this->district->id,
                'title' => $this->district->title,
            ],
            'locality' => $this->locality,
            'street' => $this->street,
            'houseNumber' => $this->house_number,
            'apartmentNumber' => $this->apartment_number,
            'postIndex' => $this->post_index,
            'createdAt' => $this->created_at->format('d.m.Y H:i:s'),
            'updatedAt' => $this->updated_at->format('d.m.Y H:i:s'),
        ];
    }
}
