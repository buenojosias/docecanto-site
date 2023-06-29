<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Encounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class);
    }
}
