<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'maethod',
        'paymentTotal',
        'customerId',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "customerId");
    }

    public function order()
    {
        return $this->belongsTo(orders::class) ;
    }
}
