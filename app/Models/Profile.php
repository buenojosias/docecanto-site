<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'datatype',
    ];

    public $timestamps = false;

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withPivot('answer')->withTimestamps();
    }
}
