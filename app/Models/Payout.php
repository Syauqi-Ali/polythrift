<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Payout extends Model
{
    protected $fillable = [
        'store_id',
        'amount',
        'bank_name',
        'account_number',
        'account_name',
        'status',
        'requested_at',
        'processed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'requested_at' => 'datetime',
        'processed_at' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}