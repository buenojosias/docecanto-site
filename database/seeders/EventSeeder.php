<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Event::factory(8)->create();

        $songsCount = \App\Models\Song::count();
        $membersCount = \App\Models\Member::count();
        $events = Event::all();

        // foreach($events->where('is_presentation', true) as $event) {
        //     $event->songs()->syncWithoutDetaching([
        //         rand(1, $songsCount) => ['position' => rand(1, 5)],
        //         rand(1, $songsCount) => ['position' => rand(1, 5)],
        //         rand(1, $songsCount) => ['position' => rand(1, 5)],
        //     ]);
        // }

        foreach($events as $event) {
            $event->members()->syncWithoutDetaching([
                rand(1, $membersCount) => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
                rand(1, $membersCount) => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
                rand(1, $membersCount) => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
            ]);
        }
    }
}
