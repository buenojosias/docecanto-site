<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audio extends Model
{
    use HasFactory;
    protected $table = 'audios';

    protected $fillable = [
        'song_id',
        'type',
        'filename',
        'path',
    ];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }
}
