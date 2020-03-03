<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
// use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        return view ('backend.products.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name"=>"required|min:3|max:191",
            "price"=>"required|min:4|max:6",
            "codeno"=>"required",
            "photo"=>"required|mimes:jpeg,jpg,png",
            
        ]);

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $uploadDir = public_path().'/storage/product/';
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move($uploadDir,$name);
            $path='/storage/product/'.$name;
        }

        $product = New Product;

        $product->product_name = request ('name');
        $product->price = request('price');
        $product->code_no = request('codeno');
        $product->photo = $path;
        $product->category_id= request('category');
        $product->save();


        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $products= Product::find($id);
        $categories= Category::all();
        return view('backend.products.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $request->validate([
            "name"=>"required|min:3|max:191",
            "price"=>"required|min:4|max:6",
            "codeno"=>"required",
            "photo"=>"required|mimes:jpeg,jpg,png"
            
        ]);

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $uploadDir = public_path().'/storage/product/';
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move($uploadDir,$name);
            $path='/storage/product/'.$name;
        }

        $product = Product::find($id);

        $product->product_name = request ('name');
        $product->price = request('price');
        $product->code_no = request('codeno');
        $product->photo = $path;
        $product->category_id= request('category');
        $product->save();


         return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
