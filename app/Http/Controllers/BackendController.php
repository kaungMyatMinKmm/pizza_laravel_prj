<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Size;
use App\Product;
use App\Table;
class BackendController extends Controller
{
    public function dashboard($value='')
    {
    	$sizes = Size::all();
    	$products = Product::all();
    	$categories = Category::all();
    	$tables = Table::all();
    	return view('backend.dashboard',compact('categories','sizes','products','tables'));
    }

}
