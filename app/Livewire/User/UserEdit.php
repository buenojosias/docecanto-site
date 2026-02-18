<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class UserEdit extends Component
{
    use Interactions;

    public $user;
    public $name;
    public $email;
    public $username;
    public $password;
    public $role;
    
    public function render()
    {
        return view('livewire.user.user-edit');
    }

    #[On('edit-user')]
    public function loadUser($user): void
    {
        $this->user = User::find($user);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->username = $this->user->username;
        $this->role = $this->user->role;
        $this->password = null;
        $this->dispatch('open-edit-modal');
    }

    public function save()
    {
        $this->resetValidation();
        $data = $this->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'.$this->user->id,
                'username' => 'required|string|min:6|max:32|unique:users,username,'.$this->user->id,
                'password' => 'nullable|string|min:6|max:32',
                'role' => 'required|string|in:coralista,coordenador,conselheiro,responsável',
            ],
        );
        if (in_array($data['role'], ['coordenador', 'conselheiro'])) {
            $data['is_admin'] = true;
        } else {
            $data['is_admin'] = false;
        }
        if (empty($data['password'])) {
            unset($data['password']);
        }

        try {
            $this->user->update($data);
            $this->dispatch('saved');
            $this->reset();
            $this->toast()->success('Usuário atualizado com sucesso!')->send();
        } catch (\Exception $e) {
            $this->dialog()->error('Erro ao atualizar usuário.')->send();
            dd($e);
        }
    }
}
