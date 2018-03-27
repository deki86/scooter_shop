<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;

class UserOrdersController extends Controller
{
    /**
     * Construct
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->middleware('can:view,user')->only(['index', 'show']);
    }
    /**
     * Displays all orders for a particular user
     * @param  App\User   $user
     * @return mixed
     */
    public function index(User $user)
    {
        $orders = $user->orders()->get();
        return view('users.orders', compact('orders'));
    }
    /**
     * Show just one order for particular user
     * @param  App\User   $user
     * @param  App\Order  $order
     * @return mixed
     */
    public function show(User $user, Order $order)
    {
        $item = $user->orders()->where('id', $order->id)->first();
        $part = json_decode($item->parts, true);
        return view('users.orderShowOne', compact('item', 'part'));
    }
}
