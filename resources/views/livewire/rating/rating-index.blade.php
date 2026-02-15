<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Fichas técnicas</h2>
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'member.name', 'label' => 'Integrante', 'sortable' => false],
            ['index' => 'height', 'label' => 'Altura', 'sortable' => false],
            ['index' => 'tuning', 'label' => 'Segurança<br />vocal', 'sortable' => false, 'unescaped' => true],
            ['index' => 'vocal_power', 'label' => 'Potência<br />vocal', 'sortable' => false, 'unescaped' => true],
            ['index' => 'lowestNote.name', 'label' => 'Nota mais<br />grave', 'sortable' => false, 'unescaped' => true],
            [
                'index' => 'highestNote.name',
                'label' => 'Nota mais<br />aguda',
                'sortable' => false,
                'unescaped' => true,
            ],
        ];
    @endphp
    <x-ts-table :headers="$headers" :rows="$this->ratings" striped>
        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>
</div>
