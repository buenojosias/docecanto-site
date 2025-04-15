<?php

namespace App\Livewire\Financial\Modals;

use App\Models\Wallet;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateWallet extends Component
{
    public $modal = false;

    #[Validate('required|string|unique:wallets|max:255', as: 'Nome')]
    public $name;

    #[Validate('required|numeric', as: 'Saldo inicial')]
    public $balance;

    #[On('open-create-wallet-modal')]
    public function openModal()
    {
        $this->modal = true;
    }

    private function convertToFloat(string $amount): float
    {
        $amount = str_replace(['.',','], '', $amount);
        return floatval($amount/100);
    }

    public function render()
    {
        return view('livewire.financial.modals.create-wallet');
    }

    public function createWallet()
    {
        $this->balance = $this->convertToFloat($this->balance);
        $data = $this->validate();

        if (Wallet::create($data)) {
            $this->modal = false;
            $this->dispatch('wallet-created');
            $this->reset(['name', 'balance']);
        };
    }
}
