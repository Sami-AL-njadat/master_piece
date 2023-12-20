<?php

namespace App\Models;

use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    protected $table = 'orderitems';
    protected $fillable = [
        "quantity",
        "price",
        "orderId",
        'customerId',
        "productId"
    ];
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(orders::class , 'orderId', 'id');
    }
/////  note that i  change the order name to  orders
 
    public function product()
    {
        return $this->belongsTo(products::class, "productId");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customerId', 'id');
    }
}
