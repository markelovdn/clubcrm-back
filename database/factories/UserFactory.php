<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'secondname' => $this->generateSecondName(),
            'firstname' => $this->generateFirstName(),
            'middlename' => $this->generateMiddlename(),
            'date_of_birth' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->generateMobilePhone(),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    protected function generateFirstName(): string
    {
        $secondname = [
            'Александр', 'Дмитрий', 'Максим', 'Сергей', 'Андрей',
            'Алексей', 'Артём', 'Илья', 'Кирилл', 'Михаил', 'Никита',
            'Павел', 'Роман', 'Владимир', 'Егор', 'Иван', 'Константин',
            'Лев', 'Николай', 'Олег', 'Петр', 'Степан', 'Федор',
            'Юрий', 'Василий'
        ];

        return $this->faker->randomElement($secondname);
    }

    protected function generateSecondName(): string
    {
        $secondname = [
            'Иванов', 'Петров', 'Сидоров', 'Кузнецов', 'Попов',
            'Васильев', 'Соколов', 'Михайлов', 'Новиков', 'Федоров',
            'Морозов', 'Волков', 'Алексеев', 'Лебедев', 'Семенов',
            'Егоров', 'Павлов', 'Козлов', 'Степанов', 'Николаев',
            'Орлов', 'Андреев', 'Макаров', 'Никитин', 'Захаров'
        ];

        return $this->faker->randomElement($secondname);
    }

    protected function generateMiddlename(): string
    {
        $patronymics = [
            'Александрович', 'Иванович', 'Петрович', 'Сергеевич',
            'Владимирович', 'Борисович', 'Николаевич', 'Михайлович',
        ];

        return $this->faker->randomElement($patronymics);
    }

    protected static $usedPhoneNumbers = [];

    protected function generateMobilePhone(): string
    {
        do {
            $phoneNumber = "+7 (9" . rand(1, 9) . rand(1, 9) . ") "
                . rand(1, 9) . rand(1, 9) . rand(1, 9) . " "
                . rand(1, 9) . rand(1, 9) . rand(1, 9) . rand(1, 9);
        } while (in_array($phoneNumber, self::$usedPhoneNumbers));

        self::$usedPhoneNumbers[] = $phoneNumber;
        return $phoneNumber;
    }
}
