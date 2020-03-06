<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = [
        'voucher_no', 'recipe_id', 'qty'
    ];
}
