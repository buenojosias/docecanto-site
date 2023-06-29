<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'to_stock',
        'request_date',
        'deliver_date',
        'subtotal',
        'discount',
        'freight',
        'amount'
    ];

    protected $casts = [
        'to_stock' => 'booblean',
        'request_date' => 'date',
        'deliver_date' => 'date',
        'subtotal' => 'integer',
        'discount' => 'integer',
        'freight'=> 'integer',
        'amount' => 'integer'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }
}
