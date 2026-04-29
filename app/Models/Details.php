<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    //
      protected $fillable = [
        'name',
        'price',
        'stock_status',
        'rating',
        'description',
        'image',
    ];
    
}
