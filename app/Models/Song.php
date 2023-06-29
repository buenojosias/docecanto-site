<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    // CONSIDERAR SEPARAR AUDIO_PATH EM OUTRA TABELA

    protected $fillable = [
        'number',
        'title',
        'resume',
        'lyrics',
        'fulltext',
        'detached',
        'audio_path'
    ];

    protected $casts = [
        'number' => 'integer'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->withPivot(['position']);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'song_id');
    }
}
