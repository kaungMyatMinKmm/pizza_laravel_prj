<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name', 'price',
    ];
    public function size($value='')
    {
    	return $this->hasMany('App\Size');
    }
}
