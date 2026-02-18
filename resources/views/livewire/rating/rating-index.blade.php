<div class="space-y-6">
    <x-ts-banner text="Em desenvolvimento" color="red" />
    <div class="page-header">
        <div class="title">
            <h2>Fichas técnicas</h2>
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'member.name', 'label' => 'Integrante'],
            ['index' => 'height', 'label' => 'Altura'],
            ['index' => 'tuning', 'label' => 'Segurança vocal'],
            ['index' => 'vocal_power', 'label' => 'Potência vocal'],
            ['index' => 'lowestNote.name', 'label' => 'Nota mais grave'],
            ['index' => 'highestNote.name', 'label' => 'Nota mais aguda'],
        ];
    @endphp
    <x-ts-table :headers="$headers" :rows="$this->ratings" :sort>
        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>
</div>
