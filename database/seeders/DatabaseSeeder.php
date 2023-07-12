<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MemberSeeder::class,
            KinSeeder::class,
            ContactSeeder::class,
            ProfileSeeder::class,
            CategorySeeder::class,
            SongSeeder::class,
            EventSeeder::class,
            EncounterSeeder::class,
        ]);
    }
}
