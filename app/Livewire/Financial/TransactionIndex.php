<?php

namespace App\Livewire\Financial;

use App\Models\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class TransactionIndex extends Component
{
    use Interactions;
    use WithPagination;

    public ?string $category = null;

    public ?string $flow = null;

    public ?string $dateStart = null;

    public ?string $dateEnd = null;

    #[Computed]
    public function categories(): Collection
    {
        return Transaction::query()
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');
    }

    #[Computed]
    public function transactions(): LengthAwarePaginator
    {
        return Transaction::query()
            ->select(['id', 'date', 'description', 'category', 'amount', 'registered_by'])
            ->with('user:id,name')
            ->when($this->category, function ($query): void {
                $query->where('category', $this->category);
            })
            ->when($this->dateStart, function ($query): void {
                $query->whereDate('date', '>=', $this->dateStart);
            })
            ->when($this->dateEnd, function ($query): void {
                $query->whereDate('date', '<=', $this->dateEnd);
            })
            ->when($this->flow, function ($query): void {
                if ($this->flow === 'entrada') {
                    $query->where('amount', '>=', 0);
                }

                if ($this->flow === 'saida') {
                    $query->where('amount', '<', 0);
                }
            })
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->paginate();
    }

    public function updatedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedFlow(): void
    {
        $this->resetPage();
    }

    public function updatedDateStart(): void
    {
        $this->resetPage();
    }

    public function updatedDateEnd(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.financial.transaction-index')->title('Transações');
    }

    #[On('transaction-created')]
    public function transactionCreated(): void
    {
        $this->toast()->success('Transação lançada com sucesso.')->send();
    }

    #[On('transaction-error')]
    public function transactionError(): void
    {
        $this->dialog()->error('Ocorreu um erro ao lançar transação.')->send();
    }
}
