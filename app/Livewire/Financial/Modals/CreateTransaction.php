<?php

namespace App\Livewire\Financial\Modals;

use App\Models\Wallet;
use App\Services\TransactionService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $modal = false;
    public $wallets = [];

    #[Validate('required|string', as: 'Categoria')]
    public $category;

    #[Validate('required|string', as: 'Descrição')]
    public $description;

    #[Validate('nullable|string', as: 'Observação')]
    public $note;

    #[Validate('required|date_format:Y-m-d', as: 'Data de pagamento')]
    public $date;

    #[Validate('required|string', as: 'Valor')]
    public $displayAmount;

    #[Validate('required|numeric|min:0', as: 'Valor')]
    public $amount;

    #[Validate('required|integer', as: 'Carteira')]
    public $wallet_id;

    #[Validate('required|string', as: 'Fluxo')]
    public $flow = 'Entrada';

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    #[On('open-transaction-modal')]
    public function openTransactionModal()
    {
        if (empty($this->wallets)) {
            $this->loadWallets();
        }
        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.financial.modals.create-transaction');
    }

    public function loadWallets()
    {
        $this->wallets = Wallet::select('id', 'name')
            ->orderBy('name')
            ->get()->toArray();
        array_unshift($this->wallets, ['id' => null, 'name' => 'Selecione']);
    }

    public function addTransaction()
    {
        $this->amount = str_replace(',', '.', str_replace('.', '', $this->displayAmount));
        $data = $this->validate();

        $transactionData = [
            'wallet_id' => $this->wallet_id,
            'category' => $this->category,
            'description' => $this->description,
            'note' => $this->note,
            'date' => $this->date,
            'amount' => $this->flow === 'Entrada' ? +$this->amount : -$this->amount,
        ];

        $transaction = TransactionService::create($transactionData);

        if ($transaction) {
            $this->modal = false;
            $this->dispatch('transaction-created');
            $this->reset([
                'category',
                'description',
                'note',
                'date',
                'displayAmount',
                'amount',
                'wallet_id'
            ]);
        } else {
            \DB::rollBack();
            $this->dispatch('transaction-error');
            $this->modal = false;
        }
    }
}
