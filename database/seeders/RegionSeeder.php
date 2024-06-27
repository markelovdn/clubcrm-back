<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $countries = Country::all()->pluck('id', 'code');
        $districts = District::all()->pluck('id', 'code');

        $regions = [
            ['code' => '1-RUS', 'title' => 'Республика Адыгея (Адыгея)', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '2-RUS', 'title' => 'Республика Башкортостан', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '3-RUS', 'title' => 'Республика Бурятия', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '4-RUS', 'title' => 'Республика Алтай', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '5-RUS', 'title' => 'Республика Дагестан', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '6-RUS', 'title' => 'Республика Ингушетия', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '7-RUS', 'title' => 'Кабардино-Балкарская Республика', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '8-RUS', 'title' => 'Республика Калмыкия', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '9-RUS', 'title' => 'Карачаево-Черкесская Республика', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '10-RUS', 'title' => 'Республика Карелия', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '11-RUS', 'title' => 'Республика Коми', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '12-RUS', 'title' => 'Республика Марий Эл', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '13-RUS', 'title' => 'Республика Мордовия', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '14-RUS', 'title' => 'Республика Саха (Якутия)', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '15-RUS', 'title' => 'Республика Северная Осетия — Алания', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '16-RUS', 'title' => 'Республика Татарстан (Татарстан)', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '17-RUS', 'title' => 'Республика Тыва', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '18-RUS', 'title' => 'Удмуртская Республика', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '19-RUS', 'title' => 'Республика Хакасия', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '21-RUS', 'title' => 'Чувашская Республика (Чувашия)', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '22-RUS', 'title' => 'Алтайский край', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '23-RUS', 'title' => 'Краснодарский край', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '24-RUS', 'title' => 'Красноярский край', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '25-RUS', 'title' => 'Приморский край', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '26-RUS', 'title' => 'Ставропольский край', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '27-RUS', 'title' => 'Хабаровский край', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '28-RUS', 'title' => 'Амурская область', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '29-RUS', 'title' => 'Архангельская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '30-RUS', 'title' => 'Астраханская область', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '31-RUS', 'title' => 'Белгородская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '32-RUS', 'title' => 'Брянская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '33-RUS', 'title' => 'Владимирская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '34-RUS', 'title' => 'Волгоградская область', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '35-RUS', 'title' => 'Вологодская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '36-RUS', 'title' => 'Воронежская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '37-RUS', 'title' => 'Ивановская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '38-RUS', 'title' => 'Иркутская область', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '39-RUS', 'title' => 'Калининградская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '40-RUS', 'title' => 'Калужская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '41-RUS', 'title' => 'Камчатский край', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '42-RUS', 'title' => 'Кемеровская область', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '43-RUS', 'title' => 'Кировская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '44-RUS', 'title' => 'Костромская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '45-RUS', 'title' => 'Курганская область', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '46-RUS', 'title' => 'Курская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '47-RUS', 'title' => 'Ленинградская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '48-RUS', 'title' => 'Липецкая область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '49-RUS', 'title' => 'Магаданская область', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '50-RUS', 'title' => 'Московская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '51-RUS', 'title' => 'Мурманская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '52-RUS', 'title' => 'Нижегородская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '53-RUS', 'title' => 'Новгородская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '54-RUS', 'title' => 'Новосибирская область', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '55-RUS', 'title' => 'Омская область', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '56-RUS', 'title' => 'Оренбургская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '57-RUS', 'title' => 'Орловская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '58-RUS', 'title' => 'Пензенская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '59-RUS', 'title' => 'Пермский край', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '60-RUS', 'title' => 'Псковская область', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '61-RUS', 'title' => 'Ростовская область', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '62-RUS', 'title' => 'Рязанская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '63-RUS', 'title' => 'Самарская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '64-RUS', 'title' => 'Саратовская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '65-RUS', 'title' => 'Сахалинская область', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '66-RUS', 'title' => 'Свердловская область', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '67-RUS', 'title' => 'Смоленская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '68-RUS', 'title' => 'Тамбовская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '69-RUS', 'title' => 'Тверская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '70-RUS', 'title' => 'Томская область', 'district_code' => 'СФО', 'country_code' => 'RUS'],
            ['code' => '71-RUS', 'title' => 'Тульская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '72-RUS', 'title' => 'Тюменская область', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '73-RUS', 'title' => 'Ульяновская область', 'district_code' => 'ПФО', 'country_code' => 'RUS'],
            ['code' => '74-RUS', 'title' => 'Челябинская область', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '75-RUS', 'title' => 'Забайкальский край', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '76-RUS', 'title' => 'Ярославская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '77-RUS', 'title' => 'Москва', 'district_code' => 'Москва', 'country_code' => 'RUS'],
            ['code' => '78-RUS', 'title' => 'Санкт-Петербург', 'district_code' => 'Санкт-Петербург', 'country_code' => 'RUS'],
            ['code' => '79-RUS', 'title' => 'Еврейская автономная область', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '80-RUS', 'title' => 'Донецкая Народная Республика', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '81-RUS', 'title' => 'Луганская Народная Республика', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '82-RUS', 'title' => 'Республика Крым', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '83-RUS', 'title' => 'Ненецкий автономный округ', 'district_code' => 'СЗФО', 'country_code' => 'RUS'],
            ['code' => '84-RUS', 'title' => 'Херсонская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '85-RUS', 'title' => 'Запорожская область', 'district_code' => 'ЦФО', 'country_code' => 'RUS'],
            ['code' => '86-RUS', 'title' => 'Ханты-Мансийский автономный округ — Югра', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '87-RUS', 'title' => 'Чукотский автономный округ', 'district_code' => 'ДВФО', 'country_code' => 'RUS'],
            ['code' => '89-RUS', 'title' => 'Ямало-Ненецкий автономный округ', 'district_code' => 'УрФО', 'country_code' => 'RUS'],
            ['code' => '92-RUS', 'title' => 'Севастополь', 'district_code' => 'ЮФО', 'country_code' => 'RUS'],
            ['code' => '95-RUS', 'title' => 'Чеченская республика', 'district_code' => 'СКФО', 'country_code' => 'RUS'],
            ['code' => '1-KAZ', 'title' => 'Западно-Казахстанская область', 'district_code' => 'Не известно', 'country_code' => 'KAZ'],
        ];

        foreach ($regions as $region) {
            $districtId = $districts[$region['district_code']] ?? null;
            $countryId = $countries[$region['country_code']] ?? null;

            if ($districtId) {
                Region::insert([
                    'code' => $region['code'],
                    'title' => $region['title'],
                    'district_id' => $districtId,
                    'country_id' => $countryId,
                ]);
            }
        }
    }
}
