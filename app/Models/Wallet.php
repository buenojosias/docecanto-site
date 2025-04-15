<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Wallet extends Model
{
    protected $fillable = [
        'name',
        'balance',
    ];

    protected function casts(): array
    {
        return [
            'balance' => 'float',
        ];
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function contributions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Contribution::class,
            Transaction::class,
            'wallet_id',
            'id',
            'id',
            'contribution_id'
        );
    }
}
