<?php

namespace App\Livewire\Financial;

use App\Models\Transaction;
use App\Models\Wallet;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class FinancialIndex extends Component
{
    use Interactions;

    public function render()
    {
        $wallets = Wallet::all();
        $totalBalance = $wallets->sum('balance');
        $transactions = Transaction::select('date', 'description', 'amount')->limit(6)->orderBy('date', 'desc')->orderBy('id', 'desc')->get();

        return view('livewire.financial.financial-index', compact('wallets', 'totalBalance', 'transactions'))->title('Financeiro');
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
