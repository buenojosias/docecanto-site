<?php

namespace App\Livewire\Event;

use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventMembersItem extends Component
{
    use Interactions;

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
            $this->toast()->success('Resposta adicionada com sucesso.')->send();
            $this->showFormModal = false;
            $this->inputAnswer = null;
        } catch (\Throwable $th) {
            $this->toast()->error('Erro ao adicionar resposta.')->send();
            dump($th);
        }
    }

    public function removeAnswer(): void
    {
        $this->dialog()
        ->question('Deseja remover esta resposta?')
        ->confirm(method: 'doRemoveAnswer')
        ->cancel()
        ->send();
    }

    public function doRemoveAnswer()
    {
        try {
            $this->member->events()->detach($this->event->id);
            $this->toast()->success('Resposta removida.')->send();
        } catch (\Throwable $th) {
            $this->toast()->error('Erro ao remover resposta.')->send();
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.event.event-members-item');
    }
}
