<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class UserIndex extends Component
{
    use Interactions;
    use WithPagination;

    public int $quantity = 10;

    #[Url('search')]
    public ?string $search = null;

    #[Computed]
    public function users(): LengthAwarePaginator
    {
        return User::query()
            ->where('id', '!=', auth()->id())
            ->when($this->search, function ($query): void {
                $query->where(function ($subQuery): void {
                    $term = '%'.$this->search.'%';

                    $subQuery
                        ->where('name', 'like', $term)
                        ->orWhere('email', 'like', $term)
                        ->orWhere('username', 'like', $term);
                });
            })
            ->orderBy('name')
            ->paginate($this->quantity);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedQuantity(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.user.user-index')->title('Usuários');
    }

    #[On('user-created')]
    public function userCreated(): void
    {
        $this->toast()->success('Usuário criado com sucesso.')->send();
    }

    #[On('user-error')]
    public function userError(): void
    {
        $this->toast()->error('Erro ao criar usuário.')->send();
    }
}
