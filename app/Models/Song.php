<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'title',
        'resume',
        'lyrics',
        'fulltext',
        'detached',
    ];

    protected $casts = [
        'number' => 'integer',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->withPivot(['comment']);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'song_id', 'user_id');
    }

    public function audios(): HasMany
    {
        return $this->hasMany(Audio::class);
    }

    public function vocal(): HasOne
    {
        return $this->hasOne(Audio::class)->where('type', 'Vocal');
    }
}
