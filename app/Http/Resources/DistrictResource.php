<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'title' => $this->title,
            'country' => [
                'id' => $this->country->id,
                'code' => $this->country->code,
                'title' => $this->country->title,
            ],
        ];
    }
}
