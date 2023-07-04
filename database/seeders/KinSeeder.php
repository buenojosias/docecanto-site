<?php

namespace Database\Seeders;

use App\Models\Kin;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class KinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kin::factory(6)->create();

        $members_count = Member::count();
        foreach (Kin::all() as $kin) {
            $kin->members()->attach(rand(1, $members_count), [
                'kinship' => Arr::random(['Pai', 'Mãe']),
            ]);
        }
    }
}
