<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    protected $fillable = [
        'customerId',
        'quantity',
        'productId',
        'couponid',

    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'productId');
    }
    public function coupon()
    {
        return $this->belongsTo(coupons::class, 'couponid');
    }
}
