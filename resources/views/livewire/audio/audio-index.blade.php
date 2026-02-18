<div>
    <x-ts-card>
        <x-card-header title="Áudios">
            <x-slot:action>
                <x-ts-button wire:click="openUploadModal" flat icon="fluentui.add-12-o" scope="without-padding" />
            </x-slot:action>
        </x-card-header>
        <ul>
            @foreach ($audios as $audio)
                <li x-data="{ showPlayer: false }" class="px-4 py-2 border-b">
                    <div class="flex justify-between w-full">
                        <div>{{ $audio->type }}</div>
                        <div>
                            <x-ts-button x-show="!showPlayer" @click="showPlayer=true" flat sm icon="play"
                                class="-mr-1.5" />
                            <x-ts-button x-show="showPlayer" @click="showPlayer=false" flat sm icon="x-mark"
                                class="-mr-1.5" />
                        </div>
                    </div>
                    <div x-show="showPlayer" class="flex items-center space-x-2">
                        <div class="grow">
                            <audio controls preload="none" class="w-full">
                                <source src="{{ route('audios.show', $audio->filename) }}" type="audio/ogg">
                                <source src="{{ route('audios.show', $audio->filename) }}" type="audio/mpeg">
                            </audio>
                        </div>
                        @can('coordinator')
                            <div>
                                <x-ts-button wire:click="deleteAudio({{ $audio }})" sm flat icon="trash" />
                            </div>
                        @endcan
                    </div>
                </li>
            @endforeach
        </ul>
    </x-ts-card>

    {{-- @if ($showPlayer)
        @livewire('media.media-player', ['media' => $selectedMedia])
    @endif --}}

    <x-ts-modal wire="showUploadModal" title="Adicionar mídia" size="md" id="audio-modal">
        <form wire:submit="submit" id="audio-form">
            <x-ts-errors class="p-4" />
            <x-ts-select.native wire:model="type" label="Tipo" class="mb-4" required>
                <option value="">Selecione</option>
                @foreach ($types as $type)
                    <option>{{ $type }}</option>
                @endforeach
            </x-ts-select.native>
            <x-ts-label label="Arquivo" />
            @if (!$validFile)
                {{-- <x-input type="file" accept="audio/mp3" wire:model="file" label="Arquivo" /> --}}
                <div class="col-span-4" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <div x-show="!isUploading" class="flex justify-center items-center w-full">
                        <label for="file"
                            class="flex flex-col justify-center items-center w-full h-12 bg-gray-50 rounded border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-row justify-center items-center pt-5 pb-6">
                                <svg aria-hidden="true" class="mt-1 w-8 h-8 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">Clique para selecionar o arquivo</span>
                                </p>
                            </div>
                            <input id="file" type="file" wire:model="file" accept="audio/mp3" class="hidden">
                        </label>
                    </div>
                    <div x-show="isUploading" class="mt-4 w-full rounded-3xl">
                        <progress class="w-full h-2 rounded-3xl" max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            @endif
            @if ($validFile)
                <audio width="100%" class="rounded" controls>
                    <source src="{{ $validFile->temporaryUrl() }}" type="audio/ogg">
                    <source src="{{ $validFile->temporaryUrl() }}" type="audio/mpeg">
                    Não há suporte.
                </audio>
            @endif
            <x-slot:footer>
                <x-ts-button type="submit" form="audio-form" primary text="Enviar" />
                <x-ts-button x-on:click="$modalClose('audio-modal')" text="Cancelar" flat />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
