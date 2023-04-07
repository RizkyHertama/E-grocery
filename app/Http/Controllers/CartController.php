<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function viewMyCart()
    {
        $item = Items::all();
        $cartItems = Orders::where('user_id', '=', Auth::id())->get();

        $details = Orders::all();

        $totalPrice = 0;
        foreach ($details as $detail) {
            $totalPrice += $detail->price;
        }

        return view('/cart')
            ->with('cartItems', $cartItems)
            ->with('totalPrice', $totalPrice);
    }

    // public function viewUpdateQTY()
    // {
    //     $item = Items::all();
    //     $cartItems = Orders::where('user_id', '=', Auth::id())->get();

    //     return view('/updatequantity')
    //         ->with('cartItems', $cartItems);
    // }

    public function addItemToCart(Request $request){

        $rules = [
            'quantity' => 'gt:0',
        ];

        $errorMessages = [
            'quantity.gt' => 'The quantity must be greater than 0.'
        ];

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $cartItem = Orders::where('user_id', '=', Auth::id())->where('item_id', '=', $request->item_id)->first();
        $getItem = Items::where('id', '=', $request->item_id)->first();

        if ($cartItem != null) {
            $cartItem->quantity = $cartItem->quantity + $request->quantity;
            $cartItem->price = $cartItem->price + ($request->quantity * $getItem->item_price);
        } else {
            $cartItem = new Orders();

            $cartItem->user_id = Auth::id();
            $cartItem->item_id = $request->item_id;
            $cartItem->price = $request->quantity * $getItem->item_price;
            $cartItem->quantity = $request->quantity;
        }

        $cartItem->update();
        $cartItem->save();
        return redirect('/cart');
    }

    public function DeleteItemCart(Request $request)
    {
        $cartItem = Orders::where('user_id', '=', Auth::id())->where('item_id', '=', $request->item_id)->first();

        if ($cartItem != null) {
        $cartItem->delete();
        }

        return redirect()->back();
    }

    public function checkout(Request $request){
        $carts = Orders::where('user_id', '=', Auth::id())->get();
        // $order = new Orders();

        // $order->user_id = Auth::id();
        // $order->save();


        // foreach ($carts as $cart) {
        //     $order = new Orders();

        //     $order->user_id = $cart->user_id;
        //     $order->item_id = $cart->item_id;
        //     $order->price = $cart->price;
        //     $order->quantity = $cart->quantity;

        //     $order->save();
        // }

        // foreach ($carts as $cart) {
        // $carts->each->update();
        // $carts->each->save();
        // }

        $carts->each->update();
        $carts->each->save();

        $cartItem = Orders::where('user_id', '=', Auth::id())->where('item_id', '=', $request->item_id)->first();

        if ($cartItem != null) {
        $cartItem->delete();
        }


        // $carts->each->delete();

        return redirect('/successCheckout');
    }
}
