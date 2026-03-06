<?php

namespace App\Livewire\Financial\Modals;

use App\Enums\TransactionTypeEnum;
use App\Models\Wallet;
use App\Services\TransactionService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class WalletTransfer extends Component
{
    public $modal = false;

    public $wallets = [];

    #[Validate('required|exists:wallets,id', as: 'Carteira de origem')]
    public $source_wallet_id;

    #[Validate('required|exists:wallets,id|different:source_wallet_id', as: 'Carteira de destino')]
    public $destination_wallet_id;

    #[Validate('required|numeric|min:0.01', as: 'Valor')]
    public $amount;

    #[On('open-transfer-modal')]
    public function openModal()
    {
        $this->loadWallets();
        $this->modal = true;
    }

    public function loadWallets()
    {
        $this->wallets = Wallet::select('id', 'name', 'balance')->get()->map(function ($wallet) {
            return [
                'id' => $wallet->id,
                'name' => $wallet->name . ' (Saldo: R$ ' . number_format($wallet->balance, 2, ',', '.') . ')',
                'balance' => $wallet->balance,
            ];
        })->toArray();
        array_unshift($this->wallets, ['id' => '', 'name' => 'Selecione uma carteira', 'balance' => 0]);
    }

    public function transfer()
    {
        if (is_string($this->amount)) {
            $this->amount = $this->amount / 100;
        }

        $this->validate();

        $sourceWallet = Wallet::find($this->source_wallet_id);
        $destinationWallet = Wallet::find($this->destination_wallet_id);

        if ($this->amount > $sourceWallet->balance) {
            $this->addError('amount', 'O valor da transferência não pode ser maior que o saldo da carteira de origem.');
            return;
        }

        // Outgoing transaction
        TransactionService::create([
            'wallet_id' => $sourceWallet->id,
            'category' => 'Transferência',
            'description' => 'Transferência para ' . $destinationWallet->name,
            'date' => now(),
            'type' => TransactionTypeEnum::TRANSFER,
            'amount' => -$this->amount,
        ]);

        // Incoming transaction
        TransactionService::create([
            'wallet_id' => $destinationWallet->id,
            'category' => 'Transferência',
            'description' => 'Transferência de ' . $sourceWallet->name,
            'date' => now(),
            'type' => TransactionTypeEnum::TRANSFER,
            'amount' => $this->amount,
        ]);

        $this->modal = false;
        $this->dispatch('wallet-transferred');
        $this->reset(['source_wallet_id', 'destination_wallet_id', 'amount']);
    }

    public function render()
    {
        return view('livewire.financial.modals.wallet-transfer');
    }
}
