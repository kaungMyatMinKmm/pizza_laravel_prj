<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['name', 'photo','price'];

    public function Product($value='')
    {
    	return $this->hasMany('App\Product');
    }
    
}
