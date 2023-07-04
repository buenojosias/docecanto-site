<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Josias Bueno',
            'email' => 'josias@email.com',
            'username' => 'josias',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);
    }
}
