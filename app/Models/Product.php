<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'variation',
        'default_price',
        'stock',
    ];

    protected $casts = [
        'default_price' => 'integer',
        'stock' => 'integer',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
