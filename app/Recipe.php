<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'topping_id', 'crust_id', 'size_id','price',
    ];

    public function orderdetails($value='')
    {
    	return $this->hasMany('App\Ordetail');
    }
    public function topping($value='')
   {
   	 return $this->belongsTo('App\Topping');
   }
    public function crust($value='')
   {
   	 return $this->belongsTo('App\Crust');
   }
    public function size($value='')
   {
   	 return $this->belongsTo('App\Size');
   }

}
