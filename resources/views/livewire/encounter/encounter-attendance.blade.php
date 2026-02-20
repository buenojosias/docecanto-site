<div class="space-y-4">
    @if ($this->membersWithoutAttendance->where('status', 'Ativo')->count() > 0)
        <x-ts-card header="Registrar participações">
            @php
                $registrarHeaders = [
                    ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
                    ['index' => 'p', 'label' => 'P', 'sortable' => false],
                    ['index' => 'f', 'label' => 'F', 'sortable' => false],
                    ['index' => 'j', 'label' => 'J', 'sortable' => false],
                ];
            @endphp
            <x-ts-table :headers="$registrarHeaders" :rows="$this->membersWithoutAttendance->where('status', 'Ativo')" striped>
                @interact('column_name', $row)
                    {{ $row->name }}
                @endinteract

                @interact('column_p', $row)
                    <x-ts-radio :id="'attendance_' . $row->id . '_P'" name="selectAttendance[{{ $row->id }}][attendance]" label=""
                        value="P" wire:model="selectedAttendance.{{ $row->id }}" />
                @endinteract

                @interact('column_f', $row)
                    <x-ts-radio :id="'attendance_' . $row->id . '_F'" name="selectAttendance[{{ $row->id }}][attendance]" label=""
                        value="F" wire:model="selectedAttendance.{{ $row->id }}" />
                @endinteract

                @interact('column_j', $row)
                    <x-ts-radio :id="'attendance_' . $row->id . '_J'" name="selectAttendance[{{ $row->id }}][attendance]" label=""
                        value="J" wire:model="selectedAttendance.{{ $row->id }}" />
                @endinteract

                <x-slot:empty>
                    <x-empty />
                </x-slot:empty>
            </x-ts-table>
            <x-slot:footer>
                <x-ts-button wire:click="submitAttendance" primary text="Salvar" loading="submitAttendance" />
                <x-ts-button wire:click="resetAttendance" flat text="Resetar" />
            </x-slot:footer>
        </x-ts-card>
    @endif

    <x-ts-card header="Registro de participações">
        @php
            $registroHeaders = [
                ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
                ['index' => 'attendance', 'label' => 'Status', 'sortable' => false],
                ['index' => 'action', 'label' => '', 'sortable' => false],
            ];
        @endphp
        <x-ts-table :headers="$registroHeaders" :rows="$this->membersWithAttendance->where('status', 'Ativo')" striped>
            @interact('column_name', $row)
                <div x-data="{ showNote: false }">
                    {{ $row->name }}
                    @if ($row->pivot->note)
                        <x-ts-button @click="showNote = !showNote" sm flat primary icon="fluentui.comment-24-o" />
                        <div x-show="showNote" x-collapse
                            class="w-full text-sm text-gray-700 border-l-4 border-slate-600 pl-1.5">
                            {{ $row->pivot->note }}
                        </div>
                    @endif
                </div>
            @endinteract

            @interact('column_attendance', $row)
                <span class="font-semibold text-center {{ $row->pivot->attendance === 'F' ? 'text-red-700' : '' }}">
                    {{ $row->pivot->attendance }}
                </span>
            @endinteract

            @interact('column_action', $row)
                <x-ts-button wire:click="openChangeModal({{ $row }})" flat xs text="Alterar" />
            @endinteract

            <x-slot:empty>
                <x-empty label="Nenhum registro lançado." />
            </x-slot:empty>
        </x-ts-table>
    </x-ts-card>

    @if ($showChangeModal)
        <x-ts-modal title="Alterar registro" wire="showChangeModal" size="md">
            <form class="space-y-4">
                <x-ts-input label="Membro" value="{{ $changeMember['name'] }}" readonly />
                <x-ts-select.native wire:model="newAttendance" label="Novo status" required>
                    <option value="">Selecione</option>
                    <option value="P">P</option>
                    <option value="F">F</option>
                    <option value="J">J</option>
                </x-ts-select.native>
                <x-ts-textarea wire:model="newNote" rows="2" label="Comentário" />
            </form>
            <x-slot:footer>
                <x-ts-button wire:click="saveChange" primary text="Salvar" />
            </x-slot:footer>
        </x-ts-modal>
    @endif
</div>
