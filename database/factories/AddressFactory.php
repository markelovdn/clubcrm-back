<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Country;
use App\Models\District;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{

    protected $model = Address::class;

    public function definition()
    {
        $country = Country::inRandomOrder()->first();
        $district = District::inRandomOrder()->first();
        $region = $district->regions()->inRandomOrder()->first();

        return [
            'country_id' => $country->id,
            'district_id' => $district->id,
            'region_id' => $region->id,
            'locality' => $this->generateLocalityName(),
            'street' => $this->generateStreetName(),
            'house_number' => $this->faker->numberBetween(1, 300),
            'apartment_number' => $this->faker->randomNumber(2),
            'post_index' => $this->faker->postcode
        ];
    }

    protected function generateLocalityName(): string
    {
        $localitys = [
            "город Москва",
            "город Санкт-Петербург",
            "город Новосибирск",
            "город Екатеринбург",
            "город Нижний Новгород",
            "поселок Усть-Абакан",
            "поселок Алейск",
            "поселок Архангельск",
            "поселок Беломорск",
            "поселок Березники"
        ];

        return $this->faker->randomElement($localitys);
    }

    protected function generateStreetName(): string
    {
        $streets = [
            "улица Ленина",
            "улица Гагарина",
            "улица Пушкина",
            "улица Толстого",
            "улица Кирова",
            "проспект Ленинградский",
            "проспект Победы",
            "проспект Просвещения",
            "проспект Мира",
            "проспект Свободы",
            "переулок Речной",
            "переулок Цветочный",
            "переулок Зеленый",
            "переулок Солнечный",
            "переулок Лесной"
        ];

        return $this->faker->randomElement($streets);
    }
}
