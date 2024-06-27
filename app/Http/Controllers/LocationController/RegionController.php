<?php

namespace App\Http\Controllers\LocationController;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionsResource;
use App\Models\Region;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegionController extends Controller
{
    public function index(): ResourceCollection
    {
        return RegionsResource::collection(Region::with('country', 'district')->get());
    }

    public function show(int $id)
    {
        return new RegionsResource(Region::with('country', 'district')->find($id));
    }
}
