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

        foreach (Kin::all() as $kin) {
            $member = Member::inRandomOrder()->first();
            if ($member) {
                $kin->members()->attach($member->id, [
                    'kinship' => Arr::random(['Pai', 'Mãe']),
                ]);
            }
        }
    }
}
