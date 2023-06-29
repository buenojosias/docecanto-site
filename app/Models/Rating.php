<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'height',
        'tuning',
        'vocal_power',
        'lowest_note_id',
        'highest_note_id'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function lowestNote(): BelongsTo
    {
        return $this->belongsTo(Note::class, 'lowest_note_id', 'id');
    }

    public function highestNote(): BelongsTo
    {
        return $this->belongsTo(Note::class, 'highest_note_id', 'id');
    }
}
