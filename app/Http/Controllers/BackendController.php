<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topping;
use App\Size;
use App\Crust;

class BackendController extends Controller
{
    public function dashboard($value='')
    {
    	$toppings = Topping::all();
    	$sizes = Size::all();
    	$crusts = Crust::all();
    	return view('backend.dashboard',compact('toppings','sizes','crusts'));
    }

}
