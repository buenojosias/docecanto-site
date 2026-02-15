<?php

namespace App\Livewire\Financial;

use App\Models\Transaction;
use App\Models\Wallet;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class FinancialIndex extends Component
{
    use Interactions;

    #[Computed]
    public function wallets()
    {
        return Wallet::all();
    }

    #[Computed]
    public function transactions()
    {
        return Transaction::select('date', 'description', 'amount')->limit(6)->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        $totalBalance = $this->wallets->sum('balance');

        return view('livewire.financial.financial-index', compact('totalBalance'))->title('Financeiro');
    }

    #[On('wallet-created')]
    public function walletCreated()
    {
        $this->toast()->success('Carteira adicionada com sucesso.')->send();
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
