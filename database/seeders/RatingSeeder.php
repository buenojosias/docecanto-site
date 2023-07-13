<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::query()->select(['id'])->get();
        foreach ($members as $member) {
            Rating::factory(1)->create([
                'member_id' => $member->id
            ]);
        }
    }
}
