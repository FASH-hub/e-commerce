<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart()
    {
        $cart = DB::insert(
        'insert into carts(user_id, date, product_id)
                             values(?,?,?)', [4, now(), 2]);
        dd($cart);
    }

    public function destroyCartt()
    {
        $id = 3;
        $cart = DB::table('carts')
        ->where('id', $id)
            ->delete();
        dd($cart);
    }

    public function updateCart()
    {
        $id = 7;
        $newUserId = 5;
        DB::table('carts')
        ->where('id', $id)
            ->update(array('user_id' => $newUserId));
    }
}
