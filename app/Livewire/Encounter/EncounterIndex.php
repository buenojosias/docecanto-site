<?php

namespace App\Livewire\Encounter;

use App\Models\Encounter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class EncounterIndex extends Component
{
    use Interactions, WithPagination;

    public string $activeTab = 'Próximos';

    public ?string $dateStart = null;

    public ?string $dateEnd = null;

    public int $quantity = 15;

    #[On('tab-changed')]
    public function handleTabChange($tab): void
    {
        $this->activeTab = $tab;
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

    #[Computed]
    public function proximos(): LengthAwarePaginator
    {
        return Encounter::query()
            ->whereDate('date', '>=', now())
            ->when($this->dateStart, function ($query): void {
                $query->whereDate('date', '>=', $this->dateStart);
            })
            ->when($this->dateEnd, function ($query): void {
                $query->whereDate('date', '<=', $this->dateEnd);
            })
            ->orderBy('date', 'asc')
            ->paginate($this->quantity);
    }

    #[Computed]
    public function realizados(): LengthAwarePaginator
    {
        return Encounter::query()
            ->whereDate('date', '<', now())
            ->when($this->dateStart, function ($query): void {
                $query->whereDate('date', '>=', $this->dateStart);
            })
            ->when($this->dateEnd, function ($query): void {
                $query->whereDate('date', '<=', $this->dateEnd);
            })
            ->with('members')
            ->orderBy('date', 'desc')
            ->paginate($this->quantity);
    }

    public function render(): View
    {
        return view('livewire.encounter.encounter-index')
            ->title('Ensaios');
    }
}
