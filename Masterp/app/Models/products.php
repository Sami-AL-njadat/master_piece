<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    public function Category()
    {

        return $this->belongsTo(categories::class, "categoryId","id" );
    

    }
    public function orderItems()
    {
        return $this->hasMany(orderItems::class );

    }


}



