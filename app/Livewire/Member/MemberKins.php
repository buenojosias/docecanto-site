<?php

namespace App\Livewire\Member;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberKins extends Component
{
    use Interactions;

    public $member;
    public $action;
    public $kinForm;
    // public $showFormModal = false;

    #[Computed]
    public function kins()
    {
        return $this->member->kins()->withPivot('kinship')->get();
    }

    public function render()
    {
        return view('livewire.member.member-kins');
    }
}
