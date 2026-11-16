<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'proof',
        'status',
        'payment_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}