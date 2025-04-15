<?php

namespace App\Livewire\Financial;

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

        return view('livewire.financial.financial-index', compact('wallets', 'totalBalance'));
    }

    #[On('wallet-created')]
    public function walletCreated()
    {
        $this->toast()->success('Carteira adicionada com sucesso.')->send();
    }
}
