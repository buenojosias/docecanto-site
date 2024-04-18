<?php

namespace App\Livewire\Member;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class MemberIndex extends Component
{
    use WireUiActions;
    use WithPagination;

    public $status = 'Ativo';

    public function render()
    {
        $members = Member::query()
            ->orderBy('name')
            ->when($this->status, function($query) {
                return $query->where('status', $this->status);
            })
            ->paginate();

        foreach ($members as $member) {
            $member->birthday = Carbon::parse($member->birth)->format('d/m');
            $member->age = Carbon::parse($member->birth)->age;
        }

        return view('livewire.member.member-index', [
            'members' => $members,
        ]);
    }
}
