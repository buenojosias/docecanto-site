<div>
    @if ($membersWithoutAttendence->where('status', 'Ativo')->count() > 0)
        <div class="card mb-4">
            <form wire:submit.prevent="submitAttendance">
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
                                        <x-radio id="right-label" label="P" value="P"
                                            wire:model.defer="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                    <td class="w-4 px-0">
                                        <x-radio id="right-label" label="F" value="F"
                                            wire:model.defer="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                    <td class="w-4 px-0">
                                        <x-radio id="right-label" label="J" value="J"
                                            wire:model.defer="selectedAttendance.{{ $member->id }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <x-button type="submit" primary sm label="Salvar" />
                    <x-button wire:click="resetAttendance" flat sm label="Resetar" />
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
                                    <x-button @click="showNote = !showNote" xs flat primary icon="annotation" />
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
                                <x-button wire:click="openChangeModal({{ $member }})" outline xs label="Alterar" />
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
        <x-modal wire:model.defer="showChangeModal" max-width="md">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Alterar registro</h3>
                </div>
                <div class="card-body display">
                    <div class="space-y-2">
                        <div>
                            <x-input label="Membro" value="{{ $changeMember['name'] }}" readonly />
                        </div>
                        <div>
                            <x-native-select wire:model.defer="newAttendance" label="Novo status" required>
                                <option value="">Selecione</option>
                                <option value="P">P</option>
                                <option value="F">F</option>
                                <option value="J">J</option>
                            </x-native-select>
                        </div>
                        <div>
                            <x-textarea wire:model="newNote" rows="2" label="Comentário" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <x-button wire:click="saveChange" primary label="Salvar" />
                    <x-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
