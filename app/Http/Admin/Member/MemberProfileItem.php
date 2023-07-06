<?php

namespace App\Http\Admin\Member;

use Livewire\Component;
use WireUi\Traits\Actions;

class MemberProfileItem extends Component
{
    use Actions;

    public $member;
    public $question;
    public $answer;
    public $answerInput;

    public function mount($member, $question)
    {
        $this->question = $question;
        $this->member = $member;
        $this->answer = $question->members->first()->pivot->answer ?? '';
        $this->answerInput = $this->answer;
    }

    public function submitAnswer() {
        $this->member->profiles()->syncWithoutDetaching([$this->question->id => ['answer' => $this->answerInput]]);
        $this->answer = $this->answerInput;
        $this->dispatchBrowserEvent('close', ['expand' => false]);
        $this->notification()->success($description = 'Resposta salva com sucesso.');
    }

    public function resetInput() {
        $this->answerInput = $this->answer;
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

    public function doRemoveAnswer() {
        $this->member->profiles()->detach($this->question);
        $this->answer = null;
        $this->notification()->success($description = 'Resposta removida.');
    }

    public function render()
    {
        return view('admin.member.member-profile-item');
    }
}
