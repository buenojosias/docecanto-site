<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Josias Bueno',
            'email' => 'josias@email.com',
            'username' => 'josias',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);

        User::factory(5)->hasMember()->create();
    }
}
