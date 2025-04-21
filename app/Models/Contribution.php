<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = [
        'member_id',
        'type',
        'month',
        'year',
        'date',
        'amount',
        'registered_by',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'registred_by');
    }

    protected function monthFormatted(): Attribute
    {
        return Attribute::get(
            fn() => sprintf('%02d', $this->month)
        );
    }
}
