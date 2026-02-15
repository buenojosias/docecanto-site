<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class UserIndex extends Component
{
    use Interactions;
    use WithPagination;

    public function render()
    {
        $users = User::query()
            ->orderBy('name')
            ->paginate();

        return view('livewire.user.user-index', [
            'users' => $users,
        ])->title('Usuários');
    }

    #[On('user-created')]
    public function userCreated()
    {
        $this->toast()->success('Usuário criado com sucesso.')->send();
    }

    #[On('user-error')]
    public function userError()
    {
        $this->toast()->error('Erro ao criar usuário.')->send();
    }
}
