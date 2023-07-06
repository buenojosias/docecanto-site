<?php

namespace App\Http\Admin\Member;

use App\Models\Profile;
use Livewire\Component;
use WireUi\Traits\Actions;

class MemberProfile extends Component
{
    use Actions;

    public $member;
    public $questions;

    public function mount($member) {
        // $this->fake();
        $this->member = $member;
    }

    public function render()
    {
        $this->questions = Profile::query()
            ->with('members', function($query) {
                $query->where('member_id', $this->member->id);
            })
            ->get();

        return view('admin.member.member-profile');
    }

    public function fake() {
        $this->member->profiles()->syncWithoutDetaching([1 => ['answer' => 'Lorem']]);
        $this->member->profiles()->syncWithoutDetaching([3 => ['answer' => 'Ipsum']]);
        $this->member->profiles()->syncWithoutDetaching([7 => ['answer' => 'Dollor']]);
    }
}
