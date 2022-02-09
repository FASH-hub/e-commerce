<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartController extends Controller
{

    /*
    * ------------------------------
    * Displays all created carts
    * ------------------------------
    */
    function displayCarts()
    {
        return Cart::all();
    }


    /**
     * ----------------------------------
     * Creates a new cart in the database.
     * ----------------------------------
     */
    public function addCart(Request $request)
    {
        $cart = new Cart();
        $cart->userId = $request->userId;
        $cart->productId = $request->productId;
        $result = $cart->save();

        if ($result) {
            return ["item" => "has been added"];
        } else {
            return ["item" => "has not been added"];
        }
    }

    /**
     * ----------------------------------
     * Delete a cart from database.
     * ----------------------------------
     */
    public function destroyCart($id)
    {
        $cart = Cart::find($id);
        $resutl = $cart->delete();

        if ($resutl) {
            return ["item" => "has been deleted"];
        } else {
            return ["item" => "couldn't be deleted"];
        }
    }


    /**
     * --------------------------------
     * Update a cart already in database.
     * --------------------------------
     */
    public function updateCart(Request $request, $id)
    {
        $cart = new Cart();
        $cart = Cart::find($id);
        $cart->userId = $request->userId;
        $cart->productId = $request->productId;
        $result = $cart->save();

        if ($result) {
            return ["item" => " updated"];
        } else {
            return ["item" => " couldn't be updated"];
        }
    }

}
