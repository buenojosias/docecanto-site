<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Song::factory(10)->create();

        // foreach (\App\Models\Song::all() as $key => $song) {
        //     $song->categories()->syncWithoutDetaching([rand(1, 3)]);
        // }

        foreach (\App\Models\Category::all() as $key => $category) {
            $category->songs()->syncWithoutDetaching([rand(1, 10)]);
        }
    }
}
