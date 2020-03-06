<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crust extends Model
{
    protected $fillable = [
        'name', 'price', 'photo'
    ];
}
