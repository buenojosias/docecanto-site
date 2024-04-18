<?php

namespace App\Livewire\Member;

use App\Models\Address;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class MemberAddress extends Component
{
    use WireUiActions;

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
                $this->notification()->success($description = 'Endereço atualizado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao atualizar endereço.');
            }
        } else {
            try {
                $this->addressData = $this->member->address()->create($data);
                $this->notification()->success($description = 'Endereço cadastrado com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar endereço.');
                dump($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.member.member-address');
    }
}
