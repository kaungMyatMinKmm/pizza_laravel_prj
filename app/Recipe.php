<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['size_id','order_id','name', 'price', 'qty'];

    public function Size($value='')
    {
    	return $this->belongsTo('App\Size');
    }
    

    public function Product($value='')
    {
    	return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
