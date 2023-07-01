<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'field',
        'value',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }
}
