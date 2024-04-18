<?php

namespace App\Livewire\Rating;

use App\Models\Note;
use App\Models\Rating;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class RatingForm extends Component
{
    use WireUiActions;

    public $member;
    public $data;
    public $options = [1, 2, 3, 4, 5];
    public $notes;

    public function mount($member, $rating = null)
    {
        $this->notes = Note::all();
        $this->member = $member;
        if ($rating) {
            $this->data = $rating->toArray();
            $this->data['lowest_note'] = $this->data['highest_note'] = null;
        } else {
            $this->createRating();
        }
    }

    public function createRating()
    {
        $rating = $this->member->rating()->create();
        $this->data = $rating->toArray();
        $this->data['lowest_note'] = $this->data['highest_note'] = null;
    }

    public function submit()
    {
        $notes = $this->notes->pluck('id');
        $data = $this->validate([
            'data.height' => 'nullable|integer|min:100|max:190',
            'data.tuning' => 'nullable|integer|in:' . implode(',', $this->options),
            'data.vocal_power' => 'nullable|integer|in:' . implode(',', $this->options),
            'data.lowest_note_id' => 'nullable|integer|in:' . $notes,
            'data.highest_note_id' => 'nullable|integer|in:' . $notes,
        ]);

        try {
            Rating::query()->findOrFail($this->data['id'])->update($this->data);
            $this->notification()->success('Atualização salva com sucesso.');
        } catch (\Throwable $th) {
            $this->notification()->error('Erro ao salvar atualizações.');
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.rating.rating-form');
    }
}
