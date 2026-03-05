<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(8)->create();

        $songs = \App\Models\Song::pluck('id');
        $members = \App\Models\Member::pluck('id');
        $events = Event::all();

        if ($songs->isNotEmpty()) {
            foreach ($events->where('is_presentation', true) as $event) {
                $event->songs()->syncWithoutDetaching([
                    $songs->random() => ['comment' => 'Lorem ipsum'],
                    $songs->random(),
                    $songs->random(),
                ]);
            }
        }

        if ($members->isNotEmpty()) {
            foreach ($events as $event) {
                $event->members()->syncWithoutDetaching([
                    $members->random() => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
                    $members->random() => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
                    $members->random() => ['answer' => Arr::random(['Sim', 'Não', 'Talvez'])],
                ]);
            }
        }
    }
}
