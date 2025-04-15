<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'description',
        'note',
        'date',
        'amount',
        'balance_before',
        'balance_after',
        'registred_by',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'amount' => 'float',
            'balance_before' => 'float',
            'balance_after' => 'float'
        ];
    }

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'registred_by');
    }
}
