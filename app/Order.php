<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['table_id', 'order_no','orderdate','total'];

    public function recipe($value='')
    {
    	return $this->belongsTo('App\Recipe');
    	
    }
    public function table($value='')
    {
    	return $this->belongsTo('App\Table');
    	
    }
}
