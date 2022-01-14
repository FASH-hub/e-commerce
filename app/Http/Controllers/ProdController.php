<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdController extends Controller
{
    
    public function addProduct()
    {
        $product = DB::insert('insert into products (title, price, category, description, quantity) 
                             values (?, ?, ?, ?, ?)', ['computer', 1079, 'Mac', 'macBook pro', 1]);

        dd($product);
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
