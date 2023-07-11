<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::factory(15)->create();

        foreach (Song::all() as $song) {
            $song->categories()->syncWithoutDetaching([rand(1, 5)]);
        }

        // foreach (\App\Models\Category::all() as $key => $category) {
        //     $category->songs()->syncWithoutDetaching([rand(1, 10)]);
        // }
    }
}
