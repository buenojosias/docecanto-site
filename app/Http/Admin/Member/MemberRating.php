<?php

namespace App\Http\Admin\Member;

use Livewire\Component;
use WireUi\Traits\Actions;

class MemberRating extends Component
{
    use Actions;

    public $member;
    public $rating;
    public $showRating = false;
    public $showFormModal = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadRating()
    {
        $this->rating = $this->member->rating()->with(['lowestNote','highestNote'])->first();
        $this->showRating = true;
    }

    public function unloadRating()
    {
        $this->showRating = false;
        $this->rating = [];
    }

    public function openFormModal()
    {
        $this->showFormModal = true;
    }

    public function render()
    {
        return view('admin.member.member-rating');
    }
}
