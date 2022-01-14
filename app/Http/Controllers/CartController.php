<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContrCarts extends Controller
{
    public function addCart()
    {
        $cart = DB::insert('insert into carts(user_id, date, product_id)
                             values(?,?,?)', [2, now(), 2]);
        dd($cart);
    }
}
