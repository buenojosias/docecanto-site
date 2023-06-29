<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withPivot(['kinship']);
    }
}
