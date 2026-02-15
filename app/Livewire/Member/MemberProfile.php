<?php

namespace App\Livewire\Member;

use App\Models\Profile;
use Livewire\Component;

class MemberProfile extends Component
{
    public $member;
    public $questions;
    public $showProfile = false;

    public function mount($member) {
        $this->member = $member;
    }

    public function loadProfile()
    {
        $this->questions = Profile::query()
            ->with('members', function($query) {
                $query->where('member_id', $this->member->id);
            })
            ->get();

            $this->showProfile = true;
    }

    public function unloadProfile()
    {
        $this->showProfile = false;
        $this->questions = [];
    }

    public function render()
    {
        return view('livewire.member.member-profile');
    }
}
