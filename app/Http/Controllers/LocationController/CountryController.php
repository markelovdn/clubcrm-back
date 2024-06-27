<?php

namespace App\Http\Controllers\LocationController;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return Country::get();
    }

    public function show(int $id)
    {
        return Country::find($id);
    }
}
