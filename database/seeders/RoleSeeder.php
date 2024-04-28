<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Рут' => Role::ROOT,
            'Админ' => Role::ADMIN,
            'Менеджер' => Role::MANAGER,
            'Тренер' => Role::COACH,
            'Спортсмен' => Role::ATHLETE,
            'Судья' => Role::REFEREE,
            'Родитель' => Role::PARENTAD
        ];

        foreach ($roles as $title => $code) {
            Role::updateOrCreate(
                ['code' => $code],
                ['title' => $title]
            );
        }
    }
}
