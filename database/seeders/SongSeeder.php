<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::factory(15)->create();

        $categories = \App\Models\Category::pluck('id');

        if ($categories->isNotEmpty()) {
            foreach (Song::all() as $song) {
                $song->categories()->syncWithoutDetaching([$categories->random()]);
            }
        }

        // if ($songs->isNotEmpty()) {
        //     foreach (\App\Models\Category::all() as $key => $category) {
        //         $category->songs()->syncWithoutDetaching([$songs->random()]);
        //     }
        // }
    }
}
