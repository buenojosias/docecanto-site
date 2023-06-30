<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birth',
        'registration_date',
        'status',
        'whatsapp',
    ];

    protected $casts = [
        'birth' => 'date'
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function contacts(): MorphMany {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function encounters(): BelongsToMany
    {
        return $this->belongsToMany(Encounter::class);
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(Parent::class)->withPivot(['kinship']);
    }

    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class)->withPivot('answer')->withTimestamps();
    }

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
