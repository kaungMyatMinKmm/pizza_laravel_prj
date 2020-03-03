<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taste extends Model
{
	protected $fillable = ['name'];

	public function Recipe($value='')
	    {
	    	return $this->belongsToMany('App\Recipe')->withTimestamp();
	    }    
}
