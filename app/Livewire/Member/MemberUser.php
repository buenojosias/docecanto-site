<?php

namespace App\Livewire\Member;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberUser extends Component
{
    use Interactions;

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
                $this->toast()->success('Usuário atualizado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao atualizar usuário.')->send();
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
                $this->toast()->success('Usuário cadastrado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao cadastrar usuário.')->send();
                dump($th);
            }
        }
    }

    public function resetPassword(): void
    {
        $this->dialog()
            ->question('Deseja redefinir a senha?', 'Será criada uma nova senha baseada na data de nascimento do integrante.')
            ->confirm('Confirmar', 'doResetPassword')
            ->cancel('Cancelar')
            ->send();
    }

    public function doResetPassword()
    {
        try {
            $newPassword = bcrypt(Carbon::parse($this->member->birth)->format('dmy'));
            $this->user->update(['password' => $newPassword]);
            $this->toast()->success('Senha redefinida com sucesso.')->send();
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->dialog()->error('Erro ao redefinir senha.')->send();
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.member.member-user');
    }
}
