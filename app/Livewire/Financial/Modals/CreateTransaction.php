<?php

namespace App\Livewire\Financial\Modals;

use App\Enums\TransactionMethodEnum;
use App\Enums\TransactionTypeEnum;
use App\Models\Wallet;
use App\Services\TransactionService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $modal = false;

    public $wallets = [];

    public $types = [];

    public $mothods = [];

    #[Validate('required|string', as: 'Categoria')]
    public $category;

    #[Validate('required|string', as: 'Descrição')]
    public $description;

    #[Validate('nullable|string', as: 'Observação')]
    public $note;

    #[Validate('required|date_format:Y-m-d', as: 'Data do pagamento')]
    public $date;

    #[Validate('required|string', as: 'Valor')]
    public $displayAmount;

    #[Validate('required|numeric|min:0', as: 'Valor')]
    public $amount;

    #[Validate('required|integer', as: 'Carteira')]
    public $wallet_id;

    #[Validate('required|string', as: 'Método')]
    public $method;

    #[Validate('required|string', as: 'Tipo')]
    public $type;

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    #[On('open-transaction-modal')]
    public function openTransactionModal()
    {
        if (empty($this->wallets)) {
            $this->loadWallets();
            $this->loadMethodsTypes();
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

    public function loadMethodsTypes()
    {
        $this->mothods = collect(TransactionMethodEnum::cases())
            ->map(fn ($method) => ['value' => $method->value, 'label' => $method->label()])
            ->values()
            ->toArray();
        array_unshift($this->mothods, ['value' => null, 'label' => 'Selecione']);

        $this->types = collect(TransactionTypeEnum::cases())
            ->filter(fn ($type) => $type != TransactionTypeEnum::TRANSFER)
            ->map(fn ($type) => ['value' => $type->value, 'label' => $type->label()])
            ->values()
            ->toArray();
        array_unshift($this->types, ['value' => null, 'label' => 'Selecione']);
    }

    public function addTransaction()
    {
        $this->amount = $this->displayAmount / 100;
        $data = $this->validate();

        $transactionData = [
            'wallet_id' => $this->wallet_id,
            'category' => $this->category,
            'description' => $this->description,
            'note' => $this->note,
            'date' => $this->date,
            'amount' => $this->type === 'income' ? +$this->amount : -$this->amount,
            'type' => $this->type,
            'method' => $this->method,
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
                'wallet_id',
            ]);
        } else {
            \DB::rollBack();
            $this->dispatch('transaction-error');
            $this->modal = false;
        }
    }
}
