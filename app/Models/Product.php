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
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    //    public function purchases(): HasMany
    //    {
    //        return $this->hasMany(PurchaseItem::class);
    //    }
    //
    //    public function sales(): HasMany
    //    {
    //        return $this->hasMany(Sale::class);
    //    }
}
