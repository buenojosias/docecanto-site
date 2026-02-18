<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CreateGlobal extends Component
{
    use Interactions;

    public $name;
    public $email;
    public $username;
    public $password;
    public $role;

    public function render()
    {
        return view('livewire.user.create-global');
    }

    public function create()
    {
        $this->resetValidation();
        $data = $this->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|string|min:6|max:32|unique:users,username',
                'password' => 'required|string|min:6|max:32',
                'role' => 'required|string|in:coordenador,conselheiro,responsável',
            ],
        );
        if (in_array($data['role'], ['coordenador', 'conselheiro'])) {
            $data['is_admin'] = true;
        }

        try {
            User::create($data);
            $this->dispatch('created');
            $this->toast()->success('Usuário cadastrado com sucesso!')->send();
            $this->reset();
        } catch (\Exception $e) {
            $this->dialog()->error('Erro ao cadastrar usuário.')->send();
            dd($e);
        }
    }
}
