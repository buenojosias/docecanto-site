<div>
    <x-ts-card header="Detalhes do perfil">
        <ul class="text-sm text-gray-900">
            @foreach ($questions = [] as $question)
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
    </x-ts-card>
</div>
