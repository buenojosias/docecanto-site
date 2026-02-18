<?php

namespace App\Livewire\User;

use App\Models\Member;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class UserDelete extends Component
{
    use Interactions;

    public $user = null;
    public $member = null;

    #[On('delete-user')]
    public function selectUser(User $user): void
    {
        $this->user = $user;
        if ($this->user->role == 'coralista') {
            $this->user->load('member');
            $this->member = $this->user->member;
        }

        $this->dialog()
            ->question('Excluir usuário', "Tem certeza que deseja excluir o usuário {$this->user->name}?")
            ->confirm('Confirmar', 'deleteUser')
            ->send();
    }

    public function deleteUser(): void
    {
        try {
            if ($this->member) {
                $this->member->update(['user_id' => null]);
            }
            $this->user->delete();
            $this->toast()->success('Usuário excluído.')->send();
            $this->reset();
            $this->dispatch('deleted');
        } catch (\Throwable $th) {
            $this->dialog()->error('Erro ao excluir usuário.')->send();
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.user.user-delete');
    }
}
