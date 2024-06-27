<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'title' => $this->title,
            'district' => [
                'id' => $this->district_id,
                'title' => $this->district->title,
                'code' => $this->district->code
            ],
            'country' => [
                'id' => $this->country_id,
                'title' => $this->country->title,
                'code' => $this->country->code
            ]
        ];
    }
}
