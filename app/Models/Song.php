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
        return $this->belongsToMany(Event::class)->withPivot(['position']);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'song_id');
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function music(): HasOne
    {
        return $this->hasOne(Media::class)->where('type', 'music');
    }
}
