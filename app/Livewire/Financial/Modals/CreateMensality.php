<?php

namespace App\Livewire\Financial\Modals;

use App\Enums\MonthEnum;
use App\Models\Contribution;
use App\Models\Member;
use App\Models\Wallet;
use App\Services\TransactionService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateMensality extends Component
{
    public $modal = false;
    public $members = [];
    public $wallets = [];
    public $months;

    #[Validate('required|integer', as: 'Coralista')]
    public $member_id;

    #[Validate('required')]
    public $type = 'Mensalidade';

    #[Validate('required|integer|min:1|max:12', as: 'Mês de referência')]
    public $month;

    #[Validate('required|integer|digits:4|min:2025', as: 'Ano de referência')]
    public $year;

    #[Validate('required|date_format:Y-m-d', as: 'Data de pagamento')]
    public $date;

    #[Validate('required|numeric|min:0', as: 'Valor')]
    public $amount;

    #[Validate('required|integer', as: 'Carteira')]
    public $wallet_id;

    public function mount()
    {
        $this->type = 'Mensalidade';
        $months = MonthEnum::cases();
        foreach ($months as $month) {
            $this->months[] = [
                'value' => $month->value,
                'label' => $month->getName(),
                'short' => $month->getShortName()
            ];
        }
        $this->month = intval(date('m'));
        $this->year = intval(date('Y'));
        $this->date = date('Y-m-d');
    }

    #[On('open-mensality-modal')]
    public function openMensalityModal()
    {
        if (empty($this->members)) {
            $this->loadMembers();
        }
        if (empty($this->wallets)) {
            $this->loadWallets();
        }
        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.financial.modals.create-mensality');
    }

    public function loadMembers()
    {
        $this->members = Member::select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function loadWallets()
    {
        $this->wallets = Wallet::select('id', 'name')
            ->orderBy('name')
            ->get()->toArray();
        array_unshift($this->wallets, ['id' => null, 'name' => 'Selecione']);
    }

    public function addMensality()
    {
        $data = $this->validate();
        $data['registered_by'] = auth()->user()->id;
        $monthShortName = MonthEnum::from($this->month)->getShortName();

        \DB::beginTransaction();

        $contribution = Contribution::create($data);

        $transactionData = [
            'wallet_id' => $this->wallet_id,
            'model' => $contribution,
            'category' => 'Mensalidade',
            'description' => "Mensalidade de {$this->members->find($this->member_id)->name}. Referência: {$monthShortName}/{$this->year}",
            'date' => $this->date,
            'amount' => $this->amount,
        ];

        $transaction = TransactionService::create($transactionData);

        if ($contribution && $transaction) {
            \DB::commit();
            $this->modal = false;
            $this->dispatch('mensality-created');
            $this->reset(['member_id', 'date', 'amount', 'wallet_id']);
        } else {
            \DB::rollBack();
            $this->dispatch('mensality-error');
            $this->modal = false;
        }
    }
}
