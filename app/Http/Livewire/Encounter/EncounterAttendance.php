<?php

namespace App\Http\Livewire\Encounter;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class EncounterAttendance extends Component
{
    use Actions;
    use WithPagination;

    public $encounter;
    public $members;
    public $membersWithAttendence;
    public $membersWithoutAttendence;
    public $selectedAttendance = [];
    public $showChangeModal = false;

    public $changeMember, $changeAttendance;

    public $newAttendance, $newNote;

    public function mount($encounter)
    {
        $this->encounter = $encounter;
    }

    public function submitAttendance()
    {
        foreach ($this->selectedAttendance as $key => $selected) {
            $this->selectedAttendance['member_id'] = $key;
            $this->selectedAttendance['attendance'] = $selected;
            $member_id = $key;
            $attendance = $selected;
            $this->encounter->members()->syncWithoutDetaching([$member_id => ['attendance' => $attendance]]);
        }
        $this->notification()->success($description = 'Registros salvos com sucesso.');
        $this->resetAttendance();
    }

    public function resetAttendance()
    {
        $this->selectedAttendance = [];
    }

    public function openChangeModal($member) {
        $this->changeMember = $member;
        $this->newAttendance = $member['pivot']['attendance'];
        $this->newNote = $member['pivot']['note'];
        $this->showChangeModal = true;
    }

    public function saveChange() {
        if($this->newAttendance && in_array($this->newAttendance, ['P','F','J'])) {
            $this->encounter->members()->sync([
                $this->changeMember['id'] => [
                    'attendance' => $this->newAttendance,
                    'note' => $this->newNote
                ]
            ], false);
            $this->notification()->success($description = 'Registro alterado com sucesso.');
            $this->newAttendance = $this->newNote = '';
            $this->showChangeModal = false;
        } else {
            return;
        }
    }

    public function render()
    {
        $this->membersWithoutAttendence = Member::where('status', 'Ativo')->whereDoesntHave('encounters', function ($query) {
            return $query->where('encounter_id', $this->encounter->id);
        })->orderBy('name', 'asc')->get();

        $this->membersWithAttendence = $this->encounter->members()->orderBy('name', 'asc')->get();

        return view('livewire.encounter.encounter-attendance');
    }
}
