<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard($value='')
    {
    	$name="heelo world";
    	return view('backend.dashboard',compact('name'));
    }
}
