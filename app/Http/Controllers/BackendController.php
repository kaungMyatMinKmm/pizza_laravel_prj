<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Size;
use App\Product;

class BackendController extends Controller
{
    public function dashboard($value='')
    {
    	$sizes = Size::all();
    	$products = Product::all();
    	$categories = Category::all();
    	return view('backend.sales',compact('categories','sizes','products'));
    }

}
