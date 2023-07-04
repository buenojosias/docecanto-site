<?php

namespace App\Http\Admin\Member;

use Livewire\Component;
use WireUi\Traits\Actions;

class MemberContacts extends Component
{
    use Actions;

    public $member;
    public $contacts = [];
    public $showContacts = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadContacts()
    {
        $this->contacts = $this->member->contacts;
        $this->showContacts = true;
    }

    public function unloadContacts()
    {
        $this->showContacts = false;
        $this->contacts = [];
    }

    public function render()
    {
        return view('admin.member.member-contacts');
    }
}
