<?php

namespace App\Http\Controllers;

use App\Models\cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function AddProductToCart($id)
    {

        $Newcart = new cart();
        $user_id = auth()->user()->id;
        $Result = cart::where('user_id', $user_id)-> where('product_id', $id)->first();

        // dd($Result);

        if ($Result) {
            $Result->quantity += 1;
            $Result->save();
        } else {
            $Newcart->user_id = $user_id;

            $Newcart->product_id = $id;
            $Newcart->quantity = 1;
            $Newcart->save();
        }
        return redirect('/cart');
    }
    public function Cart()
    {
        return view('Products.cart');
    }
}
