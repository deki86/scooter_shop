<?php

namespace App\Http\Controllers\Cart;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Adding a product(Part) to shopping cart
     * @param Request $request Get the session
     * @param Part    $part    App/Part model
     *
     */
    public function addToCart(Request $request, Part $part)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($part, $part->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    /**
     * Display a cart view with part that are in shopping cart
     * @return mixed
     */
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop-cart', compact('sub'));
        } else {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            return view('shop-cart', compact('cart'));
        }

    }
    /**
     * Deleting a just one item from a shopping cart
     * @param  Request $request
     * @param  Part    $part    App/Part
     * @return mixed
     */
    public function deleteOneItem(Request $request, Part $part)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteItem($part, $part->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    /**
     * Deleting one row of item, deleting a set(group) of parts.
     * @param  Request $request
     * @param  Part    $part    App\Part
     * @return mixed
     */
    public function deleteRowItems(Request $request, Part $part)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteItems($part, $part->id);
        if ($cart->quantityTotal == 0) {
            $request->session()->flush();
            return redirect()->back();
        } else {
            $request->session()->put('cart', $cart);
            return redirect()->back();
        }
    }
    /**
     * Empty all items in cart
     * @param  Request $request
     * @return mixed
     */
    public function emptyCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect()->back();
    }

}
