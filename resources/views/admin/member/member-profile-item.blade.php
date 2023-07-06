<li class="sm:grid sm:grid-cols-5 py-2 px-4 gap-4 border-b">
    <div class="col-span-2">
        <h4>{{ $question->question }}</h4>
    </div>
    <div x-data="{ expand: false }" class="col-span-3">

        <div x-show="!expand" @close.window="expand=false" class="flex justify-between gap-2">
            <div class="grow">{{ $answer }}</div>
            @if ($question->members->count())
                <x-button @click="expand=true" xs flat primary icon="pencil-alt" />
                <x-button wire:click="removeAnswer" xs flat negative icon="trash" />
                {{-- <span wire:click="removeAnswer({{ $question->id }})">REMOVE</span> --}}
            @else
                <x-button @click="expand=true" flat sm primary label="Adicionar resposta" class="-my-2" />
            @endif
        </div>

        <div x-show="expand" class="flex">
            <div class="grow">
                <x-input wire:model="answerInput" class="py-1 px-2 w-full" />
            </div>
            <div>
                <x-button wire:click="submitAnswer" sm flat positive icon="check" />
                <x-button @click="expand=false" wire:click="resetInput" sm flat icon="x" />
            </div>
        </div>

    </div>
</li>
