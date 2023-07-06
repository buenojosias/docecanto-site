<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [ 'position' => 1, 'name' => 'Entrada' ],
            [ 'position' => 2, 'name' => 'Ato penitencial'],
            [ 'position' => 3, 'name' => 'Glória' ],
        ];

        \App\Models\Category::insert($categories);
    }
}
