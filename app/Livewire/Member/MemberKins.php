<?php

namespace App\Livewire\Member;

use App\Models\Kin;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberKins extends Component
{
    use Interactions;

    public $member;
    public $action;
    public $kinForm;
    public $showFormModal = false;

    public $idk, $name, $birth, $profession, $kinship;

    #[Computed]
    public function kins()
    {
        return $this->member->kins()->withPivot('kinship')->get();
    }

    public function openFormModal()
    {
        $this->showFormModal = true;
    }

    public function submit() {
        $data = $this->validate([
            'idk' => 'nullable|required_if:action,sync|integer',
            'name' => 'nullable|required_if:action,create|string|min:6|max:166',
            'birth' => 'nullable|date|before:now',
            'profession' => 'nullable|string',
            'kinship' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            if($this->action === 'create') {
                $kin = Kin::create([
                    'name' => $this->name,
                    'birth' => $this->birth,
                    'profession' => $this->profession,
                ]);
            } else if($this->action === 'sync') {
                $kin = Kin::find($this->idk);
            }
            $kin->members()->attach($this->member, [
                'kinship' => $this->kinship,
            ]);
        } catch (\Throwable $th) {
            $this->dialog()->error('Ocorreu um erro ao cadastrar/vincular familiar.')->send();
            dd($th);
        }
        if($kin) {
            DB::commit();
            $this->toast()->success('Familiar cadastrado/vinculado com sucesso.')->send();
            $this->showFormModal = false;
        } else {
            DB::rollback();
            $this->dialog()->error('Ocorreu um erro ao cadastrar/vincular familiar.')->send();
        }
    }

    public function render()
    {
        return view('livewire.member.member-kins');
    }
}
