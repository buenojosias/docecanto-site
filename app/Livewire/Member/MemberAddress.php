<?php

namespace App\Livewire\Member;

use Livewire\Component;
use TallStackUi\Traits\Interactions;

class MemberAddress extends Component
{
    use Interactions;

    public $member;
    public $addressData;
    public $address, $complement, $district, $city;
    public $showAddress = false;
    public $showFormModal = false;

    public function mount($member)
    {
        $this->member = $member;
    }

    public function loadAddress()
    {
        $this->addressData = $this->member->address;
        $this->showAddress = true;
    }

    public function unloadAddress()
    {
        $this->showAddress = false;
        $this->address = [];
    }

    public function openFormModal()
    {
        $this->address = $this->addressData->address ?? '';
        $this->complement = $this->addressData->complement ?? '';
        $this->district = $this->addressData->district ?? '';
        $this->city = $this->addressData->city ?? '';
        $this->showFormModal = true;
    }

    public function submit()
    {
        $data = $this->validate([
            'address' => 'required|string',
            'complement' => 'nullable|string',
            'district' => 'required|string',
            'city' => 'required|string',
        ]);
        if($this->addressData) {
            try {
                $this->addressData->update($data);
                $this->toast()->success('Endereço atualizado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao atualizar endereço.')->send();
            }
        } else {
            try {
                $this->addressData = $this->member->address()->create($data);
                $this->toast()->success('Endereço cadastrado com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao cadastrar endereço.')->send();
                dump($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.member.member-address');
    }
}
