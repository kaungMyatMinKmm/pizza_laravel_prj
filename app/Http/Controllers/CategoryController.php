<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::all();

        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        "name" => 'required|min:4|max:191',
        "photo"=>'required|mimes:jpeg,jpg,png'


        ]);
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $uploadDir = public_path().'/storage/pizza_img/';
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move($uploadDir,$name);
            $path='/storage/pizza_img/'.$name;
        }

        $category = new Category;
        $category->name = request('name');
        $category->photo= $path;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit',compact('category'));
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
        $request->validate([
        "name" => 'required|min:4|max:191',
        "photo" => 'sometimes|mimes:jpeg,jpg,png'



        ]);
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $uploadDir = public_path().'/storage/pizza_img/';
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move($uploadDir,$name);
            $path='/storage/pizza_img/'.$name;
        }else{
            $path = 'oldphoto';
        }

        $category =Category::find($id);
        $category->name = request('name');
        $category->photo = $path;
        $category->update();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
