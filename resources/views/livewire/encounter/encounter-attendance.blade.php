<div>
    <x-ts-toast />
    @if ($membersWithoutAttendence->where('status', 'Ativo')->count() > 0)
        <div class="card mb-4">
            <form wire:submit="submitAttendance">
                <div class="card-header">
                    <h3 class="card-title">Registrar participações</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            @foreach ($membersWithoutAttendence->where('status', 'Ativo') as $key => $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td class="w-4 px-0">
                                        <x-ts-radio id="right-label" label="P" value="P"
                                            wire:model="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                    <td class="w-4 px-0">
                                        <x-ts-radio id="right-label" label="F" value="F"
                                            wire:model="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                    <td class="w-4 px-0">
                                        <x-ts-radio id="right-label" label="J" value="J"
                                            wire:model="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <x-ts-button type="submit" primary sm text="Salvar" />
                    <x-ts-button wire:click="resetAttendance" flat sm text="Resetar" />
                </div>
            </form>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Registro de participações</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <tbody>
                    @forelse ($membersWithAttendence->where('status', 'Ativo') as $key => $member)
                        <tr>
                            <td x-data="{ showNote: false }">
                                {{ $member->name }}
                                @if ($member->pivot->note)
                                    <x-ts-button @click="showNote = !showNote" xs flat primary icon="chat-bubble-bottom-center-text" />
                                    <div x-show="showNote" class="w-full text-md text-gray-700 border-l-4 border-slate-600 pl-1.5">
                                        {{ $member->pivot->note }}
                                    </div>
                                @endif
                            </td>
                            <td
                                class="font-semibold text-center {{ $member->pivot->attendance === 'F' ? 'text-red-700' : '' }} w-4">
                                {{ $member->pivot->attendance }}
                            </td>
                            <td class="w-8">
                                <x-ts-button wire:click="openChangeModal({{ $member }})" outline xs text="Alterar" />
                            </td>
                        </tr>
                    @empty
                        <x-empty label="Nenhum registro lançado." />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if ($showChangeModal)
        <x-ts-modal wire="showChangeModal" size="md">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Alterar registro</h3>
                </div>
                <div class="card-body display">
                    <div class="space-y-2">
                        <div>
                            <x-ts-input label="Membro" value="{{ $changeMember['name'] }}" readonly />
                        </div>
                        <div>
                            <x-ts-select.native wire:model="newAttendance" label="Novo status" required>
                                <option value="">Selecione</option>
                                <option value="P">P</option>
                                <option value="F">F</option>
                                <option value="J">J</option>
                            </x-ts-select.native>
                        </div>
                        <div>
                            <x-ts-textarea wire:model="newNote" rows="2" label="Comentário" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <x-ts-button wire:click="saveChange" primary text="Salvar" />
                    <x-ts-button sm flat text="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-ts-modal>
    @endif
</div>
