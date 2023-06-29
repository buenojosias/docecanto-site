<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'address',
        'complement',
        'district',
        'city',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
