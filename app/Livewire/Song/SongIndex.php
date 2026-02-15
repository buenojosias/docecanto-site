<?php

namespace App\Livewire\Song;

use App\Models\Category;
use App\Models\Song;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class SongIndex extends Component
{
    use Interactions;
    use WithPagination;

    public array $categories = [];

    public int $quantity = 10;

    public ?string $search = null;

    #[Url('categoria', except: null)]
    public ?string $filter = null;

    #[Url('destacadas', except: false)]
    public bool $detached = false;

    public function mount(): void
    {
        $this->categories = Category::orderBy('position')->get()->toArray();
        array_unshift($this->categories, [
            'id' => null,
            'name' => 'Filtrar por categoria',
        ]);
        // add option 'Sem categoria' to the end of the array
        $this->categories[] = [
            'id' => 'sem_categoria',
            'name' => 'Sem categoria',
        ];
    }

    #[Computed]
    public function songs(): LengthAwarePaginator
    {
        return Song::query()
            ->select(['id', 'number', 'title', 'detached'])
            ->when($this->search, function ($query): void {
                $term = '%'.$this->search.'%';

                $query->where(function ($subQuery) use ($term): void {
                    $subQuery
                        ->where('title', 'like', $term)
                        ->orWhere('lyrics', 'like', $term);
                });
            })
            ->when($this->filter, function ($query) {
                if ($this->filter === 'sem_categoria') {
                    $query->doesntHave('categories');
                } else {
                    $query->whereHas('categories', function ($query) {
                        $query->where('id', $this->filter);
                    });
                }
            })
            ->when($this->detached, function ($query) {
                $query->where('detached', true);
            })
            ->orderBy('number')
            ->with('categories')
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

    public function updatedFilter(): void
    {
        $this->resetPage();
    }

    public function updatedDetached(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.song.song-index')->title('Músicas');
    }
}
