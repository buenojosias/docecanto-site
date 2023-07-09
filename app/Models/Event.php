<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'local',
        'date',
        'time',
        'description',
        'is_presentation',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withPivot(['answer'])->withTimestamps();
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class)->withPivot(['position']);
    }
}
