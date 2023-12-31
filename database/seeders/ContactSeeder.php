<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Models\Member::whereDoesntHave('contacts')->get() as $member) {
            Contact::factory(rand(0, 3))->create([
                'contactable_type' => 'App\Models\Member',
                'contactable_id' => $member->id,
            ]);
        }

        foreach (\App\Models\Kin::whereDoesntHave('contacts')->get() as $kin) {
            Contact::factory(rand(0, 3))->create([
                'contactable_type' => 'App\Models\Kin',
                'contactable_id' => $kin->id,
            ]);
        }
    }
}
