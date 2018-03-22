<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(20);
        return view('admin.order.listAll', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $parts = json_decode($order->parts, true);
        return view('admin.order.showOne', compact('order', 'parts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'flag' => 'required|in:The order is processed,The order is sent to your address',
        ]);
        $input = $request->all();

        $order->update($input);
        return redirect('orders')->with('status', 'Succesfuly updated a Order');

    }
}
