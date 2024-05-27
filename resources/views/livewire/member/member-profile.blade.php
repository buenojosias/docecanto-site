<div>
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Detalhes do perfil</h3>
            <div class="card-tools">
                @if ($showProfile)
                    <x-ts-button wire:click="unloadProfile" flat icon="chevron-up" class="-mr-2" />
                @else
                    <x-ts-button wire:click="loadProfile" flat icon="chevron-down" class="-mr-2" />
                @endif
            </div>
        </div>
        @if ($showProfile)
            <div class="card-body">
                <ul class="text-sm text-gray-900">
                    @foreach ($questions as $question)
                        @livewire(
                            'member.member-profile-item',
                            [
                                'member' => $member,
                                'question' => $question,
                                // 'answer' => $question->members->first()->pivot->answer ?? '',
                            ],
                            key($question->id)
                        )
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
