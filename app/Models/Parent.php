<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Parent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth',
        'profession',
    ];

    protected $casts = [
        'birth' => 'date'
    ];

    public function contacts(): MorphMany {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withPivot(['kinship']);
    }
}
