<?php

namespace App\Http\Admin\Member;

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

        return view('admin.member.member-users', [
            'members' => $members,
        ]);
    }
}
