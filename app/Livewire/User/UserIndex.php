<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::query()
            // ->with('user')
            ->orderBy('name')
            ->paginate();

        return view('livewire.user.user-index', [
            'users' => $users,
        ]);
    }
}
