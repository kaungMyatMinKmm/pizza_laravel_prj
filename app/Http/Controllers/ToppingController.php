<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topping;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toppings = Topping::all();
        return view('backend.toppings.index',compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.toppings.create');
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
            "name" => 'required|min:5|max:191',
            "photo" => 'required|mimes:jpeg,jpg,png',
            "price" => 'required'
             


        ]);
        // Upload // (3)

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $upload_dir = public_path().'/storage/pizza_img/';

            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move($upload_dir,$name);
            $path = '/storage/pizza_img/'.$name;
        }

        //Store Data (4)
        $topping = new Topping;
        $topping->name = request('name') ;
        $topping->price = request('price') ;
        $topping->photo = $path;

        $topping->save();

        // return redirect (5)
        return redirect()->route('toppings.index');
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
        $topping = Topping::find($id);
        return view('backend.toppings.edit',compact('topping'));
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
            "name" => 'required|min:5|max:191',
            "photo" => 'sometimes|mimes:jpeg,jpg,png',
            "price" => 'required'
           


        ]);
        // Upload // (3)

        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $upload_dir = public_path().'/storage/pizza_img/';

            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move($upload_dir,$name);
            $path = '/storage/pizza_img/'.$name;
        }else{
            $path = request('oldphoto');
        }

        //Update Data (4)
        $topping = Topping::find($id);
        $topping->name = request('name') ;
        $topping->photo = $path;
        $topping->price = request('price') ;
        

        $topping->save();

        // return redirect (5)
        return redirect()->route('toppings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topping = Topping::find($id);
        $topping->delete();
        return redirect()->route('toppings.index');
    }
}
