<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'josias@email.com'],
            [
                'name' => 'Josias Bueno',
                'username' => 'josias',
                'password' => bcrypt('123456'),
                'is_admin' => true,
            ]
        );

        User::factory(5)->hasMember()->create();
    }
}
