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
        $this->member->birth = Carbon::parse($member->birth)->format('d/m/Y');
        $this->member->registration_date = Carbon::parse($member->registration_date)->format('d/m/Y');
    }

    public function render()
    {
        return view('livewire.member.member-show');
    }
}
