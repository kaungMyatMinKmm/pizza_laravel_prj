<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Size;
use App\Taste;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recipes = Recipe::all();
        return view ('backend.recipes.index',compact ('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $recipes = Recipe::all();
        $tastes = Taste::all();
        $sizes = Size::all();
        return view ('backend.recipes.create', compact('recipes','sizes','tastes'));
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
            "name" =>"required|min:3,max:191",
            "price" => "required|min:3,max:6",
            "qty" => "required|min:1,max10"
        ]);

        $recipe = New Recipe;

        $recipe->name= request('name');
        $recipe->price = request ('price');
        $recipe->qty = request('qty');
        $recipe->save();

        $recipe->Taste()->attach(request('tastes'));

        return redirect()->route('recipes.index');
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
        //
        $recipes = Recipe::find($id);

        return view('backend.recipes.edit',compact('recipes'));
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
            "name" =>"required|min:3,max:191",
            "price" => "required|min:3,max:6",
            "qty" => "required|min:1,max10"
        ]);

        $recipe =  Recipe::find($id);

        $recipe->name= request('name');
        $recipe->price = request ('price');
        $recipe->qty = request('qty');
        $recipe->save();

        return redirect()->route('recipes.index');
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

        $recipe= Recipe::find($id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
