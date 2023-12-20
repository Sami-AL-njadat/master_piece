<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class wishlists extends Model
{
    protected $fillable = [
        'customerId',
         'productId',
 
    ];
    public function product()
    {
        return $this->belongsTo(products::class, 'productId');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'customerId');
    }
}
