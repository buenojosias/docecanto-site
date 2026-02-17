<?php

use App\Models\Kin;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

new class extends Component {
    use Interactions;

    public Member $member;

    public ?int $idk;
    public ?string $name = '';
    public $birth;
    public ?string $profession = '';
    public ?string $kinship = '';
    public ?string $action = '';

        public function openFormModal()
    {
        $this->showFormModal = true;
    }

    public function submit() {
        $data = $this->validate([
            'idk' => 'nullable|required_if:action,sync|integer',
            'name' => 'nullable|required_if:action,create|string|min:6|max:166',
            'birth' => 'nullable|date|before:now',
            'profession' => 'nullable|string',
            'kinship' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            if($this->action === 'create') {
                $kin = Kin::create([
                    'name' => $this->name,
                    'birth' => $this->birth,
                    'profession' => $this->profession,
                ]);
            } else if($this->action === 'sync') {
                $kin = Kin::find($this->idk);
            }
            $kin->members()->attach($this->member, [
                'kinship' => $this->kinship,
            ]);
        } catch (\Throwable $th) {
            $this->dialog()->error('Ocorreu um erro ao cadastrar/vincular familiar.')->send();
            dd($th);
        }
        if($kin) {
            DB::commit();
            $this->toast()->success('Familiar cadastrado/vinculado com sucesso.')->send();
            $this->dispatch('added');
            // $this->showFormModal = false;
        } else {
            DB::rollback();
            $this->dialog()->error('Ocorreu um erro ao cadastrar/vincular familiar.')->send();
        }
    }
};
?>

<x-ts-modal title="Adicionar familiar" id="kinship-modal">
    <form wire:submit="submit" id="kinship-form">
        <x-ts-errors class="mb-4 shadow" />
        <span>
            Como você deseja adicionar o membro familiar?
        </span>
        <div class="grid sm:grid-cols-4 gap-4 mt-4">
            <div class="sm:col-span-2">
                <x-ts-radio id="sync" label="Vincular familiar cadastrado" wire:model.live="action" value="sync" />
            </div>
            <div class="sm:col-span-2">
                <x-ts-radio id="create" label="Cadastrar novo familiar" wire:model.live="action" value="create" />
            </div>
            @if ($action === 'sync')
                <div class="sm:col-span-4">
                    <x-ts-select.styled label="Buscar familiar" wire:model="idk" placeholder="Comece a digitar"
                        :request="route('api.kins')" select="label:name|value:id" />
                </div>
            @endif
            @if ($action === 'create')
                <div class="sm:col-span-4">
                    <x-ts-input wire:model="name" label="Nome *" placeholder="Nome completo" required />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-input type="date" wire:model="birth" label="Data de nascimento" />
                </div>
                <div class="sm:col-span-4">
                    <x-ts-input wire:model="profession" label="Profissão" placeholder="Profissão" />
                </div>
            @endif
            @if ($action)
                <div class="sm:col-span-4">
                    <x-ts-input wire:model="kinship" label="Grau de parentesco" placeholder="Grau de parentesco" />
                </div>
                @if ($action === 'sync')
                    <div class="sm:col-span-2"></div>
                @endif
            @endif
        </div>
        <x-slot:footer>
            @if ($action)
                <x-ts-button type="submit" form="kinship-form" text="Salvar" primary loading="submit" />
            @endif
            <x-ts-button text="Cancelar" x-on:click="$modalClose('kinship-modal')" color="white" loading="submit" />
        </x-slot>
    </form>
</x-ts-modal>
