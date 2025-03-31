<?php

namespace App\Livewire\Member;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberShow extends Component
{
    use Interactions;

    public $member;

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->member->age = Carbon::parse($member->birth)->age;
    }

    public function render()
    {
        return view('livewire.member.member-show');
    }
}
