<?php

namespace App\Livewire\Event;

use Livewire\Component;
// use WireUi\Traits\WireUiActions;

class EventMembersItem extends Component
{
    // use WireUiActions;

    public $event;
    public $member;
    public $showFormModal = false;
    public $inputAnswer;
    public $action;

    public function mount($event, $member)
    {
        $this->event = $event;
        $this->member = $member;
        $this->member->event = $this->member->events->first();
        $this->member->answer = $this->member->event->pivot->answer ?? null;
    }

    public function openFormModal($action)
    {
        if($action === 'edit') {
            $this->action = 'edit';
            $this->inputAnswer = $this->member->answer;
        } else {
            $this->action = 'create';
        }
        $this->showFormModal = true;
    }

    public function submit()
    {
        if (! $this->inputAnswer)
            return;

        try {
            $this->member->events()->syncWithoutDetaching([$this->event->id => ['answer' => $this->inputAnswer]]);
            $this->notification()->success($description = 'Resposta adicionada com sucesso.');
            $this->showFormModal = false;
            $this->inputAnswer = null;
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao adicionar resposta.');
            dump($th);
        }
    }

    public function removeAnswer(): void
    {
        $this->dialog()->confirm([
            'title' => 'Deseja remover esta resposta?',
            'method' => 'doRemoveAnswer',
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doRemoveAnswer()
    {
        try {
            $this->member->events()->detach($this->event->id);
            $this->notification()->success($description = 'Resposta removida.');
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao remover resposta.');
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.event.event-members-item');
    }
}
