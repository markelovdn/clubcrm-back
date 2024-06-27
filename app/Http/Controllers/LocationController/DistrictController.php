<?php

namespace App\Http\Controllers\LocationController;

use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;

class DistrictController extends Controller
{
    public function index()
    {
        return DistrictResource::collection(District::with('country')->get());
    }

    public function show(int $id)
    {
        return new DistrictResource(District::with('country')->find($id));
    }
}
