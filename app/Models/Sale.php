<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'product_id',
        'amount',
        'request_date',
        'deliver_date',
        'note'
    ];

    protected $casts = [
        'amount' => 'integer',
        'request_date' => 'date',
        'deliver_date' => 'date',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
