<?php

namespace App\Livewire\Financial;

use App\Enums\MonthEnum;
use App\Models\Contribution;
use App\Models\Member;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class MensalityIndex extends Component
{
    use Interactions;
    use WithPagination;

    public ?string $dateStart = null;

    public ?string $dateEnd = null;

    public ?int $memberId = null;

    public ?int $referenceMonth = null;

    #[Computed]
    public function members(): Collection
    {
        return Member::query()
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    #[Computed]
    public function months(): array
    {
        return collect(MonthEnum::cases())
            ->map(fn (MonthEnum $month): array => [
                'value' => $month->value,
                'label' => $month->getName(),
            ])
            ->all();
    }

    #[Computed]
    public function mensalities(): LengthAwarePaginator
    {
        return Contribution::query()
            ->where('type', 'Mensalidade')
            ->with('member')
            ->when($this->dateStart, function ($query): void {
                $query->whereDate('date', '>=', $this->dateStart);
            })
            ->when($this->dateEnd, function ($query): void {
                $query->whereDate('date', '<=', $this->dateEnd);
            })
            ->when($this->memberId, function ($query): void {
                $query->where('member_id', $this->memberId);
            })
            ->when($this->referenceMonth, function ($query): void {
                $query->where('month', $this->referenceMonth);
            })
            ->orderBy('date', 'desc')
            ->paginate(15);
    }

    public function updatedDateStart(): void
    {
        $this->resetPage();
    }

    public function updatedDateEnd(): void
    {
        $this->resetPage();
    }

    public function updatedMemberId(): void
    {
        $this->resetPage();
    }

    public function updatedReferenceMonth(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.financial.mensality-index')->title('Mensalidades');
    }

    #[On('mensality-created')]
    public function mensalityCreated(): void
    {
        $this->toast()->success('Mensalidade lançada com sucesso.')->send();
    }

    #[On('mensality-error')]
    public function mensalityError(): void
    {
        $this->dialog()->error('Ocorreu um erro ao lançar mensalidade.')->send();
    }
}
