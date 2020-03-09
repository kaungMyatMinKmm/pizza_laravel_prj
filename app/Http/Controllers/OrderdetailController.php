<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderdetail;
use App\Order;
use App\Recipe;
use App\Size;
class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdetails = Orderdetail::all();
        return view('backend.orderdetails.index',compact('orderdetails'));
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
        $orderdetail = Orderdetail::findOrfail($id);
        $recipe=Recipe::find($orderdetail->recipe_id);
        return view('backend.orderdetails.show',compact('orderdetail','recipe'));
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
        $orderdetail = Orderdetail::find($id);
        $orderdetail->delete();
        return redirect()->route('orderdetails.index');
    }
    public function order_store(Request $request)
    {
        //dd($request);
        date_default_timezone_set('Asia/Rangoon');

//voucher
        $voucher = strtotime(date("h:i:s"));

        $orderdate = date('Y-m-d');
        // dd($orderdate);
        // $voucher = date("YmdH");
        // $orderdate = date('Y-m-d');
        $total=0;
        $datas = request('data');
        $data=$datas[0];
        
        $qty=0;
        
        
           
             $recipe = Recipe::create([
                "topping_id"=>$data['topping_id'],
                "crust_id" => $data['crust_id'],
                 "size_id" => $data['size_id'],
                "price" => $data['price'],
             ]);
            // $recipe->topping_id = $value['topping_id'];
            // $recipe->crust_id = $value['crust_id'];
            // $recipe->size_id = $value['size_id'];
            // $recipe->price = $value['price'];
            // $recipe->save();
            //$total+=$value['price'];
           $qty=$data['qty'];
           $price=$data['price'];
           $total=$qty*$price;

        
        //echo "you make it";

        $order = new Order;
        $order->voucher_no = $voucher;
        $order->orderdate = $orderdate;
        $order->total=$total;

        $order->save();

        $orderdetail = new Orderdetail;
        // dd($orderdetail);
        $orderdetail->voucher_no = $voucher;
        $orderdetail->recipe_id = $recipe->id;

        $orderdetail->qty = $qty;
        $orderdetail->save();
    }

}
