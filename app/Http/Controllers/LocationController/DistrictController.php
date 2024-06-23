<?php

namespace App\Http\Controllers\LocationController;

use App\Http\Controllers\Controller;
use App\Models\District;

class DistrictController extends Controller
{
    public function index()
    {
        return District::get();
    }

    public function show(int $id)
    {
        return District::find($id);
    }
}
