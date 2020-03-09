<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crust extends Model
{
    protected $fillable = [
        'name', 'price', 'photo'
    ];
    public function recipes($value='')
    {
    	return $this->hasMany('App\Recipe');
    }
}
