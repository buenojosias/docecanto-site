<?php

namespace App\Livewire\Member;

use App\Models\Contact;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class MemberContacts extends Component
{
    use WireUiActions;

    public $member;
    public $contacts = [];
    public $formContact;
    public $field, $value;
    public $showContacts = false;
    public $showFormModal = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadContacts()
    {
        $this->contacts = $this->member->contacts;
        $this->showContacts = true;
    }

    public function unloadContacts()
    {
        $this->showContacts = false;
        $this->contacts = [];
    }

    public function openFormModal($contact = null)
    {
        $this->formContact = $contact;
        $this->field = $contact['field'] ?? '';
        $this->value = $contact['value'] ?? '';
        $this->showFormModal = true;
    }

    public function submit()
    {
        $data = $this->validate([
            'field' => 'required|string',
            'value'=> 'required|'.$this->field === 'E-mail' ? 'email' : 'string',
        ]);
        if ($this->formContact) {
            try {
                Contact::find($this->formContact['id'])->update($data);
                $this->notification()->success($description = 'Contato atualizado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao atualizar contato.');
                dump($th);
            }
        } else {
            try {
                $contact = $this->member->contacts()->create($data);
                $this->notification()->success($description = 'Contato adicionado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao adicionar contato.');
                dump($th);
            }
        }
    }

    public function removeContact($contact): void
    {
        $this->dialog()->confirm([
            'title' => 'Deseja remover este contato?',
            'method' => 'doRemoveContact',
            'params' => ['contact' => $contact['id']],
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doRemoveContact($id)
    {
        try {
            $this->member->contacts()->where('id', $id)->first()->delete();
            $this->notification()->success($description = 'Contato removido com sucesso.');
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao remover contato.');
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.member.member-contacts');
    }
}
