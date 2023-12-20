<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable = [
         'EventTypeId',
        'name',
        'title',
        'clientRequest',
        'aboutProject',
        'idea',
        'image1',
        'image2',
        'image3',
        'beginning',
        'ending',
        'clientName',
        'contractValue',

    ];
    public function eventTypes()
    {

        return $this->belongsTo(event_types::class, "EventTypeId", "id");
    }
}
