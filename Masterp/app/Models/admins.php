<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password', // Add 'password' to the fillable fields
        // Other fields...
    ];

    // Other model code...
}