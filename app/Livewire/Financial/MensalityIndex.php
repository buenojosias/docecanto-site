<?php

namespace App\Livewire\Financial;

use App\Models\Contribution;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class MensalityIndex extends Component
{
    use Interactions;
    use WithPagination;

    public function render()
    {
        $mensalities = Contribution::query()
            ->where('type', 'Mensalidade')
            ->with('member')
            ->orderBy('date', 'desc')
            ->paginate(15);

        return view('livewire.financial.mensality-index', compact('mensalities'));
    }

    #[On('mensality-created')]
    public function mensalityCreated()
    {
        $this->toast()->success('Mensalidade lançada com sucesso.')->send();
    }

    #[On('mensality-error')]
    public function mensalityError()
    {
        $this->dialog()->error('Ocorreu um erro ao lançar mensalidade.')->send();
    }
}
