<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\District;
use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationsTest extends TestCase
{
    public function testGetCountries(): void
    {
        $response = $this->get('api/countries');

        $response->assertStatus(200);
    }

    public function testGetCountry(): void
    {
        $country = Country::first();
        $response = $this->get('api/countries/' . $country->id);

        $response->assertStatus(200);
    }

    public function testGetDistricts(): void
    {
        $response = $this->get('api/districts');
        $response->assertStatus(200);
    }

    public function testGetDistrict(): void
    {
        $district = District::first();
        $response = $this->get('api/districts/' . $district->id);
        $response->assertStatus(200);
    }

    public function testGetRegions(): void
    {
        $response = $this->get('api/regions');
        $response->assertStatus(200);
    }

    public function testGetRegion(): void
    {
        $region = Region::first();
        $response = $this->get('api/regions/' . $region->id);
        $response->assertStatus(200);
    }
}
