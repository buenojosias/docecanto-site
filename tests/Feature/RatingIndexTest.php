<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\Note;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_ratings_index(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
            'password' => 'password',
        ]);

        $member = Member::factory()->create([
            'status' => 'Ativo',
        ]);

        $lowestNote = Note::query()->create(['name' => 'C3']);
        $highestNote = Note::query()->create(['name' => 'G4']);

        $rating = Rating::factory()
            ->for($member)
            ->create([
                'height' => 165,
                'tuning' => 4,
                'vocal_power' => 5,
                'lowest_note_id' => $lowestNote->id,
                'highest_note_id' => $highestNote->id,
            ]);

        $this
            ->actingAs($admin)
            ->get(route('ratings.index'))
            ->assertOk()
            ->assertSee($member->name)
            ->assertSee((string) $rating->height)
            ->assertSee((string) $rating->tuning)
            ->assertSee((string) $rating->vocal_power)
            ->assertSee($lowestNote->name)
            ->assertSee($highestNote->name);
    }
}
