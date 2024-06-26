<?php

namespace App\Livewire\Encounter;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class EncounterAttendance extends Component
{
    use Interactions;
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
        $this->toast()->success('Registros salvos com sucesso.')->send();
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
            $this->toast()->success('Registro alterado com sucesso.')->send();
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
