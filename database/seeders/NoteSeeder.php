<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            'Fá#2', 'Sol2', 'Sol#2', 'Lá2', 'Lá#2', 'Si2',
            'Dó3', 'Dó#3', 'Ré3', 'Ré#3', 'Mi3', 'Fá3', 'Fá#3', 'Sol3', 'Sol#3', 'Lá3', 'Lá#3', 'Si3',
            'Dó4', 'Dó#4', 'Ré4', 'Ré#4', 'Mi4', 'Fá4', 'Fá#4', 'Sol4', 'Sol#4', 'Lá4', 'Lá#4', 'Si4',
        ];
        foreach ($notes as $note) {
            \App\Models\Note::query()->create([
                'name' => $note
            ]);
        }
    }
}
