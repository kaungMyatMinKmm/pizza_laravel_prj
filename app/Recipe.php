<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'topping_id', 'crust_id', 'size_id','price',
    ];
}
