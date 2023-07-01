<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'transactionable',
        'description',
        'datetime',
        'method',
        'amount',
        'wallet_balance_before',
        'wallet_balance_after',
        'total_balance_before',
        'total_balance_after',
    ];

    protected $casts = [
        'datetime' => 'datetime',
        'amount' => 'integer',
        'wallet_balance_before' => 'integer',
        'wallet_balance_after' => 'integer',
        'total_balance_before' => 'integer',
        'total_balance_after' => 'integer',
    ];

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
