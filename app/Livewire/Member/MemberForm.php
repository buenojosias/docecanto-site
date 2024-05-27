<?php

namespace App\Livewire\Member;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class MemberForm extends Component
{
    use Interactions;
    use WithPagination;

    public $method;

    public $member, $name, $birth, $registration_date, $status;

    public function mount($member = null) {
        if ($member) {
            $this->method = 'edit';
            $this->member = Member::findOrFail($member);
            $this->name = $this->member->name;
            $this->birth = $this->member->birth;
            $this->registration_date = $this->member->registration_date;
            $this->status = $this->member->status;
        } else {
            $this->method = 'create';
        }
    }

    public function submit() {
        $data = $this->validate([
            'name' => 'required|string|min:6|max:255',
            'birth' => 'required|date|before:now',
            'registration_date' => 'nullable|date|before:tomorrow',
            'status' => 'required|string'
        ]);

        if ($this->method === 'edit') {
            try {
                $this->member->update($data);
                return redirect(route('members.show', $this->member));
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao atualizar integrante.')->send();
            }
            $this->member->update($data);
        } elseif ($this->method === 'create') {
            try {
                $this->member = Member::create($data);
                return redirect(route('members.show', $this->member));
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao cadastrar integrante.')->send();
            }
        }
    }

    public function render()
    {
        return view('livewire.member.member-form', [
            'method' => $this->method,
            'member' => $this->member ?? null,
        ]);
    }
}
