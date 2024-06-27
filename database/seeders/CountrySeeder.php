<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            'Россия' => 'RUS',
            'Казахстан' => 'KAZ',
        ];

        foreach ($countries as $title => $code) {
            Country::insert([
                'code' => $code,
                'title' => $title,
            ]);
        }
    }
}
