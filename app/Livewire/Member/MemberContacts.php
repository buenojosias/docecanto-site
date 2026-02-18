<?php

namespace App\Livewire\Member;

use App\Models\Contact;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberContacts extends Component
{
    use Interactions;

    public $member;
    public $contacts = [];
    public $formContact;
    public $field, $value;
    public $showContacts = false;
    public bool $showFormModal = false;

    public function mount($member)
    {
        $this->member = $member;
        $this->loadContacts();
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
                $this->toast()->success('Contato atualizado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao atualizar contato.')->send();
                dump($th);
            }
        } else {
            try {
                $contact = $this->member->contacts()->create($data);
                $this->toast()->success('Contato adicionado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao adicionar contato.')->send();
                dump($th);
            }
        }
    }

    public function removeContact($contact): void
    {
        $this->dialog()
            ->question('Deseja remover este contato?')
            ->confirm('Confirmar', method: 'doRemoveContact', params: ['contact' => $contact['id']])
            ->cancel('Cancelar')
            ->send();
    }

    public function doRemoveContact($id)
    {
        try {
            $this->member->contacts()->where('id', $id)->first()->delete();
            $this->toast()->success('Contato removido com sucesso.')->send();
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->dialog()->error('Erro ao remover contato.')->send();
        }
    }

    public function render()
    {
        return view('livewire.member.member-contacts');
    }
}
