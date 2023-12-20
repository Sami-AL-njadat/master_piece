<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipments extends Model
{
    protected $table = 'shipments';
    protected $fillable = [
        'address',
        'city',
        "company",
        "customerId"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "customerId", "address");
    }
    public function orderdetail()
    {
        return $this->hasMany(orders::class, "shipmentId");
    }
    // public function order()
    // {
    //     return $this->belongsTo(orders::class);
    // }
    
}
