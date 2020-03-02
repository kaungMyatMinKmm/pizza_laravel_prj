<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taste;

class TasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tastes = Taste::all();
        return view('backend.tastes.index',compact('tastes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tastes.create');
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
            "taste" => 'required|min:4:max:191'


        ]);

        $taste = new Taste;
        $taste->name = request('taste');

        $taste->save();

        return redirect()->route('tastes.index');
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
        $taste = Taste::find($id);
        return view('backend.tastes.edit',compact('taste'));
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
            "taste" => 'required|min:4:max:191'


        ]);

        $taste = Taste::find($id);
        $taste->name = request('taste');

        $taste->save();

        return redirect()->route('tastes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taste = Taste::find($id);
        $taste->delete();
        return redirect()->route('tastes.index');
    }
}
