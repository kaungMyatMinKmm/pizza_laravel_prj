<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name','photo'];

   public function product($value='')
   {
   	 return $this->hasMany('App\Product');
   }
}
