<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $districts = District::all()->pluck('id', 'code');

        $regions = [
            ['code' => '1', 'title' => 'Республика Адыгея (Адыгея)', 'district_code' => 'ЮФО'],
            ['code' => '2', 'title' => 'Республика Башкортостан', 'district_code' => 'ПФО'],
            ['code' => '3', 'title' => 'Республика Бурятия', 'district_code' => 'ДВФО'],
            ['code' => '4', 'title' => 'Республика Алтай', 'district_code' => 'СФО'],
            ['code' => '5', 'title' => 'Республика Дагестан', 'district_code' => 'СКФО'],
            ['code' => '6', 'title' => 'Республика Ингушетия', 'district_code' => 'СКФО'],
            ['code' => '7', 'title' => 'Кабардино-Балкарская Республика', 'district_code' => 'СКФО'],
            ['code' => '8', 'title' => 'Республика Калмыкия', 'district_code' => 'ЮФО'],
            ['code' => '9', 'title' => 'Карачаево-Черкесская Республика', 'district_code' => 'СКФО'],
            ['code' => '10', 'title' => 'Республика Карелия', 'district_code' => 'СЗФО'],
            ['code' => '11', 'title' => 'Республика Коми', 'district_code' => 'СЗФО'],
            ['code' => '12', 'title' => 'Республика Марий Эл', 'district_code' => 'ПФО'],
            ['code' => '13', 'title' => 'Республика Мордовия', 'district_code' => 'ПФО'],
            ['code' => '14', 'title' => 'Республика Саха (Якутия)', 'district_code' => 'ДВФО'],
            ['code' => '15', 'title' => 'Республика Северная Осетия — Алания', 'district_code' => 'СКФО'],
            ['code' => '16', 'title' => 'Республика Татарстан (Татарстан)', 'district_code' => 'ПФО'],
            ['code' => '17', 'title' => 'Республика Тыва', 'district_code' => 'СФО'],
            ['code' => '18', 'title' => 'Удмуртская Республика', 'district_code' => 'ПФО'],
            ['code' => '19', 'title' => 'Республика Хакасия', 'district_code' => 'СФО'],
            ['code' => '21', 'title' => 'Чувашская Республика (Чувашия)', 'district_code' => 'ПФО'],
            ['code' => '22', 'title' => 'Алтайский край', 'district_code' => 'СФО'],
            ['code' => '23', 'title' => 'Краснодарский край', 'district_code' => 'ЮФО'],
            ['code' => '24', 'title' => 'Красноярский край', 'district_code' => 'СФО'],
            ['code' => '25', 'title' => 'Приморский край', 'district_code' => 'ДВФО'],
            ['code' => '26', 'title' => 'Ставропольский край', 'district_code' => 'СКФО'],
            ['code' => '27', 'title' => 'Хабаровский край', 'district_code' => 'ДВФО'],
            ['code' => '28', 'title' => 'Амурская область', 'district_code' => 'ДВФО'],
            ['code' => '29', 'title' => 'Архангельская область', 'district_code' => 'СЗФО'],
            ['code' => '30', 'title' => 'Астраханская область', 'district_code' => 'ЮФО'],
            ['code' => '31', 'title' => 'Белгородская область', 'district_code' => 'ЦФО'],
            ['code' => '32', 'title' => 'Брянская область', 'district_code' => 'ЦФО'],
            ['code' => '33', 'title' => 'Владимирская область', 'district_code' => 'ЦФО'],
            ['code' => '34', 'title' => 'Волгоградская область', 'district_code' => 'ЮФО'],
            ['code' => '35', 'title' => 'Вологодская область', 'district_code' => 'СЗФО'],
            ['code' => '36', 'title' => 'Воронежская область', 'district_code' => 'ЦФО'],
            ['code' => '37', 'title' => 'Ивановская область', 'district_code' => 'ЦФО'],
            ['code' => '38', 'title' => 'Иркутская область', 'district_code' => 'СФО'],
            ['code' => '39', 'title' => 'Калининградская область', 'district_code' => 'СЗФО'],
            ['code' => '40', 'title' => 'Калужская область', 'district_code' => 'ЦФО'],
            ['code' => '41', 'title' => 'Камчатский край', 'district_code' => 'ДВФО'],
            ['code' => '42', 'title' => 'Кемеровская область', 'district_code' => 'СФО'],
            ['code' => '43', 'title' => 'Кировская область', 'district_code' => 'ПФО'],
            ['code' => '44', 'title' => 'Костромская область', 'district_code' => 'ЦФО'],
            ['code' => '45', 'title' => 'Курганская область', 'district_code' => 'УрФО'],
            ['code' => '46', 'title' => 'Курская область', 'district_code' => 'ЦФО'],
            ['code' => '47', 'title' => 'Ленинградская область', 'district_code' => 'СЗФО'],
            ['code' => '48', 'title' => 'Липецкая область', 'district_code' => 'ЦФО'],
            ['code' => '49', 'title' => 'Магаданская область', 'district_code' => 'ДВФО'],
            ['code' => '50', 'title' => 'Московская область', 'district_code' => 'ЦФО'],
            ['code' => '51', 'title' => 'Мурманская область', 'district_code' => 'СЗФО'],
            ['code' => '52', 'title' => 'Нижегородская область', 'district_code' => 'ПФО'],
            ['code' => '53', 'title' => 'Новгородская область', 'district_code' => 'СЗФО'],
            ['code' => '54', 'title' => 'Новосибирская область', 'district_code' => 'СФО'],
            ['code' => '55', 'title' => 'Омская область', 'district_code' => 'СФО'],
            ['code' => '56', 'title' => 'Оренбургская область', 'district_code' => 'ПФО'],
            ['code' => '57', 'title' => 'Орловская область', 'district_code' => 'ЦФО'],
            ['code' => '58', 'title' => 'Пензенская область', 'district_code' => 'ПФО'],
            ['code' => '59', 'title' => 'Пермский край', 'district_code' => 'ПФО'],
            ['code' => '60', 'title' => 'Псковская область', 'district_code' => 'СЗФО'],
            ['code' => '61', 'title' => 'Ростовская область', 'district_code' => 'ЮФО'],
            ['code' => '62', 'title' => 'Рязанская область', 'district_code' => 'ЦФО'],
            ['code' => '63', 'title' => 'Самарская область', 'district_code' => 'ПФО'],
            ['code' => '64', 'title' => 'Саратовская область', 'district_code' => 'ПФО'],
            ['code' => '65', 'title' => 'Сахалинская область', 'district_code' => 'ДВФО'],
            ['code' => '66', 'title' => 'Свердловская область', 'district_code' => 'УрФО'],
            ['code' => '67', 'title' => 'Смоленская область', 'district_code' => 'ЦФО'],
            ['code' => '68', 'title' => 'Тамбовская область', 'district_code' => 'ЦФО'],
            ['code' => '69', 'title' => 'Тверская область', 'district_code' => 'ЦФО'],
            ['code' => '70', 'title' => 'Томская область', 'district_code' => 'СФО'],
            ['code' => '71', 'title' => 'Тульская область', 'district_code' => 'ЦФО'],
            ['code' => '72', 'title' => 'Тюменская область', 'district_code' => 'УрФО'],
            ['code' => '73', 'title' => 'Ульяновская область', 'district_code' => 'ПФО'],
            ['code' => '74', 'title' => 'Челябинская область', 'district_code' => 'УрФО'],
            ['code' => '75', 'title' => 'Забайкальский край', 'district_code' => 'ДВФО'],
            ['code' => '76', 'title' => 'Ярославская область', 'district_code' => 'ЦФО'],
            ['code' => '77', 'title' => 'Москва', 'district_code' => 'Москва'],
            ['code' => '78', 'title' => 'Санкт-Петербург', 'district_code' => 'Санкт-Петербург'],
            ['code' => '79', 'title' => 'Еврейская автономная область', 'district_code' => 'ДВФО'],
            ['code' => '80', 'title' => 'Донецкая Народная Республика', 'district_code' => 'ЮФО'],
            ['code' => '81', 'title' => 'Луганская Народная Республика', 'district_code' => 'ЮФО'],
            ['code' => '82', 'title' => 'Республика Крым', 'district_code' => 'ЮФО'],
            ['code' => '83', 'title' => 'Ненецкий автономный округ', 'district_code' => 'СЗФО'],
            ['code' => '84', 'title' => 'Херсонская область', 'district_code' => 'ЦФО'],
            ['code' => '85', 'title' => 'Запорожская область', 'district_code' => 'ЦФО'],
            ['code' => '86', 'title' => 'Ханты-Мансийский автономный округ — Югра', 'district_code' => 'УрФО'],
            ['code' => '87', 'title' => 'Чукотский автономный округ', 'district_code' => 'ДВФО'],
            ['code' => '89', 'title' => 'Ямало-Ненецкий автономный округ', 'district_code' => 'УрФО'],
            ['code' => '92', 'title' => 'Севастополь', 'district_code' => 'ЮФО'],
            ['code' => '95', 'title' => 'Чеченская республика', 'district_code' => 'СКФО'],
            ['code' => '01', 'title' => 'Западно-Казахстанская область', 'district_code' => 'Не известно'],
        ];

        foreach ($regions as $region) {
            $districtId = $districts[$region['district_code']] ?? null;

            if ($districtId) {
                Region::insert([
                    'code' => $region['code'],
                    'title' => $region['title'],
                    'district_id' => $districtId,
                ]);
            }
        }
    }
}
