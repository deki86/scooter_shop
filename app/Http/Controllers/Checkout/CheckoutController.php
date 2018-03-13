<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Order;
use App\Part;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function showForm()
    {
        return view('checkout');
    }

    public function proccessPayment(Request $request)
    {
        //validation
        $request->validate([
            'fullname' => 'required|string|min:4|max:50',
            'email' => 'required|string|email',
            'telephone' => 'required|numeric',
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'zip' => 'required|string',

        ]);
        // geting the parts from cart session
        $cart = Session::has('cart') ? Session::get('cart') : null;

        try {
            $charge = Stripe::charges()->create([
                'amount' => $cart->priceTotal,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Payment from laravel site',
                'receipt_email' => $request->email,
                'metadata' => [
                    'data1' => 'metadata 1',
                    'data2' => 'metadata 2',
                    'data3' => 'metadata 3',
                ],
            ]);

            // store in database orders
            $input = $request->all();
            $input['payment_id'] = $charge['id'];
            $input['total_price'] = $cart->priceTotal;
            $input['parts'] = json_encode($cart);
            Order::create($input);

            // decrease part quantity that allready buyed
            foreach ($cart->items as $item) {
                $id = $item['item']['id'];
                $qty = $item['quantity'];
                $coll = Part::where('id', $id)->pluck('quantity');
                $quantityDatabase = $coll->all();

                Part::where('id', $id)->update(['quantity' => $quantityDatabase[0] - $qty]);
            }

            // sending mail to users with orders
            // empty sessions
            return back()->with('status', 'You succesfuly buy something');
        } catch (Exception $e) {
            // store in database orders with errors
        }
    }
}
