<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['position' => 1, 'name' => 'Entrada'],
            ['position' => 2, 'name' => 'Ato penitencial'],
            ['position' => 3, 'name' => 'Glória'],
            ['position' => 4, 'name' => 'Aclamação ao evangelho'],
            ['position' => 5, 'name' => 'Ofertório'],
        ];

        foreach ($categories as $categoryData) {
            \App\Models\Category::firstOrCreate(['name' => $categoryData['name']], $categoryData);
        }
    }
}
