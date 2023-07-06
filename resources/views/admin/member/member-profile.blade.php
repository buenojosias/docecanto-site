<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Detalhes do perfil</h3>
        </div>
        <div class="card-body">
            <ul class="text-sm text-gray-900">
                @foreach ($questions as $question)
                    @livewire('member.member-profile-item', [
                        'member' => $member,
                        'question' => $question,
                        // 'answer' => $question->members->first()->pivot->answer ?? '',
                    ], key($question->id))
                @endforeach
            </ul>
        </div>
    </div>
</div>
