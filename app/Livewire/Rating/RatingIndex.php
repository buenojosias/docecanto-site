<?php

namespace App\Livewire\Rating;

use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class RatingIndex extends Component
{
    public bool $showFormModal = false;

    #[Computed]
    public function ratings(): Collection
    {
        return Rating::query()
            ->with(['member', 'lowestNote', 'highestNote'])
            ->whereRelation('member', 'status', 'Ativo')
            ->get()
            ->sortBy('member.name');
    }

    public function openFormModal(): void
    {
        $this->showFormModal = true;
    }

    public function render(): View
    {
        return view('livewire.rating.rating-index')->title('Fichas técnicas');
    }
}
