<?php

namespace App\Http\Controllers\LocationController;

use App\Http\Controllers\Controller;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::get();
    }

    public function show(int $id)
    {
        return Region::find($id);
    }
}
