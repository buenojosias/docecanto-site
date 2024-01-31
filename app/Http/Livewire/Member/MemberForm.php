<?php

namespace App\Http\Livewire\Member;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class MemberForm extends Component
{
    use Actions;
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
                $this->notification()->error($description = 'Erro ao atualizar integrante.');
            }
            $this->member->update($data);
        } elseif ($this->method === 'create') {
            try {
                $this->member = Member::create($data);
                return redirect(route('members.show', $this->member));
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar integrante.');
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
