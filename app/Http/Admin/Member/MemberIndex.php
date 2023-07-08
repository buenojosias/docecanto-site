<?php

namespace App\Http\Admin\Member;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class MemberIndex extends Component
{
    use Actions;
    use WithPagination;

    public function render()
    {
        $members = Member::query()
            ->orderBy('name')
            ->paginate();

        foreach ($members as $member) {
            $member->birthday = Carbon::parse($member->birth)->format('d/m');
            $member->age = Carbon::parse($member->birth)->age;
        }

        return view('admin.member.member-index', [
            'members' => $members,
        ]);
    }
}
