<?php

namespace App\Http\Admin\Member;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class MemberShow extends Component
{
    use Actions;

    public $member;
    public $contacts;
    public $kins;

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->member->age = Carbon::parse($member->birth)->age;
        $this->contacts = $member->contacts;
        $this->kins = $member->kins;
    }

    public function render()
    {
        return view('admin.member.member-show', [
            'member' => $this->member,
            'contacts' => $this->contacts,
            'kins' => $this->kins,
        ]);
    }
}
