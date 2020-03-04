<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable =['category_id','size_id','code_no', 'name', 'price', 'photo'];

   public function Category($value='')
   {
   	 return $this->belongsTo('App\Category');
   }
   public function Size($value='')
   {
   	 return $this->belongsTo('App\Size');
   }

   public function Recipe($value='')
   {
   	return $this->belongsToMany('App\Recipe')->withTimestamps();
   }
}
