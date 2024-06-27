<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $countries = Country::all()->pluck('id', 'code');

        $districts = [
            ['code' => 'ЦФО', 'title' => 'Центральный федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'ЮФО', 'title' => 'Южный федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'СКФО', 'title' => 'Северо-кавказский федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'СЗФО', 'title' => 'Северо-западный федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'УрФО', 'title' => 'Уральский федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'ДВФО', 'title' => 'Дальневосточный федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'СФО', 'title' => 'Сибирский федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'ПФО', 'title' => 'Приволжский федеральный округ', 'country_code' => 'RUS'],
            ['code' => 'Москва', 'title' => 'город федерального значения Москва', 'country_code' => 'RUS'],
            ['code' => 'Санкт-Петербург', 'title' => 'город федерального значения Санкт-Петербург', 'country_code' => 'RUS'],
            ['code' => 'Не известно', 'title' => 'Не известно', 'country_code' => 'KAZ'],
        ];

        foreach ($districts as $district) {
            $countryId = $countries[$district['country_code']] ?? null;

            if ($countryId) {
                District::insert([
                    'code' => $district['code'],
                    'title' => $district['title'],
                    'country_id' => $countryId,
                ]);
            }
        }
    }
}
