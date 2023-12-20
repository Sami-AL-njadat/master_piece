<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_types extends Model
{
    use HasFactory;



     protected $table = 'event_types';

    protected $fillable = [
        'name',
        'description',
        
    ];
    public function events()
    {
        return $this->hasMany(events::class, 'EventTypeId');
    }
}
