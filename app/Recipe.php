<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['size_id','order_id','name', 'price', 'qty'];
}
