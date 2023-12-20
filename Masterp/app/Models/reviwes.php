<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviwes extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['name', 'review', 'rating', 'reason', 'productId' , 'customerId'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customerId');
    }

    public function product()
    {
        return $this->belongsTo(products::class, 'productId' );
    }
}
