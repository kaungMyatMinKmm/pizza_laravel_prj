<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Orderdetail;
use Illuminate\Support\Facades\URL;


use App\Orderdetail;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        
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
    }
     public function order_store(Request $request)
    {
        $voucher = date("YmdH");
        // $orderdate = date('Y-m-d');
        dd($voucher);
        $qty=1;
        $data = request('data');
        foreach ($data as $value) {
           
            $recipe = new Recipe;
            $recipe->topping_id = $value['topping_id'];
            $recipe->crust_id = $value['crust_id'];
            $recipe->size_id = $value['size_id'];
            $recipe->qty = $value['qty'];
            $recipe->price = $value['price'];
            $recipe->save();
            $total+=$value['price'];

        }

        $orderdetail = new Orderdetail;
        $orderdetail->voucher_no = $voucher;
        

        $order->save();

        // $orderdetail = new Orderdetail;
        // dd($ordetail);
        // $orderdetail->voucher_no = $voucher;
        // $orderdetail->recipe_id = $recipe;

        // $orderdetail->qty = $qty;
    }
}
