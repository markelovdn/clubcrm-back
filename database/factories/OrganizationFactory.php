<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{

    public function definition(): array
    {
        $domens = ['legion34', 'scdch34'];

        return [
            'fulltitle' => $this->faker->sentence,
            'shorttitle' => $this->faker->word,
            'reg_code' => $this->faker->randomNumber(4),
            'domen' => $this->faker->unique()->randomElement($domens),
            'verified' => $this->faker->boolean,
        ];
    }
}
