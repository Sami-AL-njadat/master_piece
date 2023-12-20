<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'totalPrice',
        'customerId',
        'shipmentId',
        'paymentId',

    ];
    public function shipment()
    {
        return $this->hasOne(shipments::class);
    }
    public function payment()
    {
        return $this->hasOne(payments::class);
    }
    public function orderItems()
    {
        return $this->hasMany(orderItems::class,'orderId');
    }

  

}
