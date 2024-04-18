<?php

namespace App\Livewire\Member;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class MemberUser extends Component
{
    use WireUiActions;

    public $member;
    public $user;
    public $email, $username;
    public $showUser = false;
    public $showFormModal = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadUser()
    {
        $this->user = $this->member->user;
        $this->showUser = true;
    }

    public function unloadUser()
    {
        $this->showUser = false;
        $this->user = [];
    }

    public function openFormModal()
    {
        $this->email = $this->user->email ?? '';
        $this->username = $this->user->username ?? '';
        $this->showFormModal = true;
    }

    public function submit()
    {
        if($this->user) {
                $data = $this->validate([
                    'email' => 'required|email|unique:users,email,'.$this->user->id,
                    'username'=> 'required|string|max:60|unique:users,username,'.$this->user->id,
                ]);
                try {
                $data['name'] = $this->member->name;
                $this->user->update($data);
                $this->notification()->success($description = 'Usuário atualizado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao atualizar usuário.');
            }
        } else {
            $data = $this->validate([
                'email' => 'required|email|unique:users,email',
                'username'=> 'required|string|max:60|unique:users,username',
            ]);
            $data['name'] = $this->member->name;
            $data['password'] = bcrypt(Carbon::parse($this->member->birth)->format('dmy'));
            try {
                $this->user = User::query()->create($data);
                $this->member->update(['user_id' => $this->user['id']]);
                $this->notification()->success($description = 'Usuário cadastrado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar usuário.');
                dump($th);
            }
        }
    }

    public function resetPassword(): void
    {
        $this->dialog()->confirm([
            'title' => 'Deseja redefinir a senha?',
            'description' => 'Será criada uma nova senha baseada na data de nascimento do integrante.',
            'method' => 'doResetPassword',
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doResetPassword()
    {
        try {
            $newPassword = bcrypt(Carbon::parse($this->member->birth)->format('dmy'));
            $this->user->update(['password' => $newPassword]);
            $this->notification()->success($description = 'Senha redefinida com sucesso.');
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao redefinir senha.');
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.member.member-user');
    }
}
