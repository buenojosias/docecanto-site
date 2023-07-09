<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Event::factory(8)->create();

        $events = Event::where('is_presentation', true)->get();
        $songsCount = \App\Models\Song::count();
        foreach($events as $event) {
            $event->songs()->syncWithoutDetaching([rand(1, $songsCount) => ['position' => rand(1, 5)]]);
        }
    }
}
