<?php

namespace App\Livewire\Financial;

use App\Models\Wallet;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class WalletIndex extends Component
{
    use Interactions;

    public $modal = false;

    #[Validate('required|string|unique:wallets|max:255', as: 'Nome')]
    public $name;

    #[Validate('required|numeric', as: 'Saldo inicial')]
    public $initial_balance;

    #[Computed]
    public function wallets()
    {
        return Wallet::all();
    }

    public function openModal()
    {
        $this->modal = true;
    }

    private function convertToFloat(string $amount): float
    {
        $amount = str_replace(['.',','], '', $amount);
        return floatval($amount/100);
    }

    public function createWallet()
    {
        $this->initial_balance = $this->convertToFloat($this->initial_balance);
        $data = $this->validate();
        $data['balance'] = $this->initial_balance;

        if (Wallet::create($data)) {
            $this->toast()->success('Carteira criada com sucesso!')->send();
            $this->modal = false;
            $this->dispatch('wallet-created');
            $this->reset(['name', 'initial_balance']);
        };
    }

    #[On('wallet-transferred')]
    public function walletTransferred()
    {
        $this->toast()->success('Transferência realizada com sucesso!')->send();
    }

    public function render()
    {
        return view('livewire.financial.wallet-index')->title('Carteiras');
    }
}
