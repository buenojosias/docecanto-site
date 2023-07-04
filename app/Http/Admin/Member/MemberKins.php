<?php

namespace App\Http\Admin\Member;

use Livewire\Component;
use WireUi\Traits\Actions;

class MemberKins extends Component
{
    use Actions;

    public $member;
    public $kins = [];
    public $showKins = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadKins()
    {
        $this->kins = $this->member->kins;
        $this->showKins = true;
    }

    public function unloadKins()
    {
        $this->showKins = false;
        $this->kins = [];
    }

    public function render()
    {
        return view('admin.member.member-kins');
    }
}
