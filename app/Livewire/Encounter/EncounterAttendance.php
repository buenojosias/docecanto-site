<?php

namespace App\Livewire\Encounter;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class EncounterAttendance extends Component
{
    use Interactions, WithPagination;

    public $encounter;

    public $selectedAttendance = [];

    public bool $showChangeModal = false;

    public $changeMember;

    public ?string $newAttendance = null;

    public ?string $newNote = null;

    public function mount($encounter): void
    {
        $this->encounter = $encounter;
    }

    #[Computed]
    public function membersWithoutAttendance(): Collection
    {
        return Member::where('status', 'Ativo')
            ->whereDoesntHave('encounters', function ($query): void {
                $query->where('encounter_id', $this->encounter->id);
            })
            ->orderBy('name', 'asc')
            ->get();
    }

    #[Computed]
    public function membersWithAttendance(): Collection
    {
        return $this->encounter->members()
            ->orderBy('name', 'asc')
            ->get();
    }

    public function submitAttendance(): void
    {
        foreach ($this->selectedAttendance as $key => $selected) {
            $this->selectedAttendance['member_id'] = $key;
            $this->selectedAttendance['attendance'] = $selected;
            $member_id = $key;
            $attendance = $selected;
            $this->encounter->members()->syncWithoutDetaching([$member_id => ['attendance' => $attendance]]);
        }
        $this->toast()->success('Registros salvos com sucesso.')->send();
        $this->resetAttendance();
    }

    public function resetAttendance(): void
    {
        $this->selectedAttendance = [];
    }

    public function openChangeModal($member): void
    {
        $this->changeMember = $member;
        $this->newAttendance = $member['pivot']['attendance'];
        $this->newNote = $member['pivot']['note'];
        $this->showChangeModal = true;
    }

    public function saveChange(): void
    {
        if ($this->newAttendance && in_array($this->newAttendance, ['P', 'F', 'J'])) {
            $this->encounter->members()->sync([
                $this->changeMember['id'] => [
                    'attendance' => $this->newAttendance,
                    'note' => $this->newNote,
                ],
            ], false);
            $this->toast()->success('Registro alterado com sucesso.')->send();
            $this->newAttendance = null;
            $this->newNote = null;
            $this->showChangeModal = false;
        }
    }

    public function render()
    {
        return view('livewire.encounter.encounter-attendance');
    }
}
