<?php

namespace App\Livewire\Financial;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class TransactionIndex extends Component
{
    use Interactions;
    use WithPagination;

    public function render()
    {
        $transactions = Transaction::query()
            ->with(['user'])
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->paginate();

        return view('livewire.financial.transaction-index', compact('transactions'))->title('Transações');
    }

    #[On('transaction-created')]
    public function transactionCreated()
    {
        $this->toast()->success('Transação lançada com sucesso.')->send();
    }

    #[On('transaction-error')]
    public function transactionError()
    {
        $this->dialog()->error('Ocorreu um erro ao lançar transação.')->send();
    }
}
