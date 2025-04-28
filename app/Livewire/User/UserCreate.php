<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserCreate extends Component
{
    #[Validate('required|string|max:255', as: 'Nome')]
    public $name;

    #[Validate('required|email|unique:users,email', as: 'E-mail')]
    public $email;

    #[Validate('required|string|min:6|max:32|unique:users,username', as: 'Username')]
    public $username;

    #[Validate('required|string|min:6|max:32', as: 'Senha')]
    public $password;

    #[Validate('required|string|min:6|max:32|same:password', as: 'Confirmação de senha')]
    public $password_confirmation;

    #[Validate('required|string|in:coordenador,conselheiro', as: 'Função')]
    public $role = 'conselheiro';

    #[Validate('required|boolean')]
    public $is_admin = true;

    #[Validate('required|boolean')]
    public $active = true;

    public $modal = false;

    public function render()
    {
        return view('livewire.user.user-create');
    }

    #[On('open-form-modal')]
    public function openFormModal()
    {
        $this->modal = true;
    }

    public function createUser()
    {
        $data = $this->validate();
        $data['password'] = bcrypt($this->password);

        if (User::create($data)) {
            $this->dispatch('user-created');
            $this->reset();
        } else {
            $this->dispatch('user-error');
            $this->modal = false;
        }
    }
}
