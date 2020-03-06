<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Crust;

class CrustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crusts = Crust::all();
        return view('backend.crusts.index',compact('crusts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.crusts.create');
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
            "price" => 'required',
            "photo" => 'required|mimes:jpeg,jpg,png'
             


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
        $crust = new Crust;
        $crust->name = request('name') ;
        $crust->price = request('price') ;
        $crust->photo = $path;

        $crust->save();

        // return redirect (5)
        return redirect()->route('crusts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crust = Crust::find($id);
        return view('backend.crusts.edit',compact('crust'));
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
        $crust = Crust::find($id);
        $crust->name = request('name') ;
        $crust->photo = $path;
        $crust->price = request('price') ;
        

        $crust->save();

        // return redirect (5)
        return redirect()->route('crusts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crust = Crust::find($id);
        $crust->delete();
        return redirect()->route('crusts.index');
    }
}
