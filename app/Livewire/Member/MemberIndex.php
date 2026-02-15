<?php

namespace App\Livewire\Member;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MemberIndex extends Component
{
    use WithPagination;

    #[Url('status')]
    public string $status = 'Ativo';

    #[Url('search')]
    public ?string $search = null;

    public ?int $quantity = 10;

    #[Computed]
    public function members()
    {
        $members = Member::query()
            ->orderBy('name')
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', "%{$this->search}%");
            })
            ->paginate($this->quantity);

        $members->map(function ($member) {
            $member->birthday = Carbon::parse($member->birth)->format('d/m');
            $member->age = Carbon::parse($member->birth)->age;

            return $member;
        });

        return $members;
    }

    public function render()
    {
        return view('livewire.member.member-index')->title('Coralistas');
    }
}
