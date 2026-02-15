<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class QueueIndex extends Component
{
    use WithPagination;

    public int $quantity = 10;

    public ?string $search = null;

    public ?string $filterStatus = null;

    public array $status_list = ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu'];

    #[Computed]
    public function queues(): LengthAwarePaginator
    {
        return Queue::query()
            ->when($this->filterStatus, function ($query): void {
                $query->where('status', $this->filterStatus);
            })
            ->when($this->search, function ($query): void {
                $term = '%'.$this->search.'%';

                $query->where(function ($subQuery) use ($term): void {
                    $subQuery
                        ->where('child_name', 'like', $term)
                        ->orWhere('parent_name', 'like', $term)
                        ->orWhere('child_phone', 'like', $term)
                        ->orWhere('parent_phone', 'like', $term);
                });
            })
            ->paginate($this->quantity);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedQuantity(): void
    {
        $this->resetPage();
    }

    public function updatedFilterStatus(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.queue.queue-index')->title('Fila de espera');
    }
}
