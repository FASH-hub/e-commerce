<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdController extends Controller
{
    public function addUser()
    {
        $user = DB::table('users')
            ->insert([
                'firstName' => 'Yvan', 'lastName' => 'BOBO', 'email' => 'bobpro@merco.com',
                'password' => Hash::make('yarabi')
            ]);
        dd($user);
    }


    public function addProduct()
    {
        $product = DB::insert('insert into products (title, price, category, description, quantity) 
                             values (?, ?, ?, ?, ?)', ['computer', 1079, 'Mac', 'macBook pro', 1]);

        dd($product);
    }


    public function addCart()
    {
        $cart = DB::insert('insert into carts(user_id, date, product_id)
                             values(?,?,?)', [2, now(), 2]);
        dd($cart);
    }

    public function offProduct()
    {
        $id = 3;
        $product = DB::table('products')
            ->where('id', $id)
            ->delete();
        dd($product);
    }
}
