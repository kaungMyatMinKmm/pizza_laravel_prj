<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $fillable = [
        'name', 'price', 'photo',
    ];
    public function recipe($value='')
    {
    	return $this->hasOne('App\Recipe');
    }
}
