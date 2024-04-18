<?php

namespace App\Livewire\Member;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MemberUsers extends Component
{
    use WithPagination;

    public function render()
    {
        $members = Member::query()
            ->with('user')
            ->orderBy('name')
            ->paginate();

        return view('livewire.member.member-users', [
            'members' => $members,
        ]);
    }
}
