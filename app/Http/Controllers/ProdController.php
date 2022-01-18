<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;

class ProdController extends Controller
{
    
    public function addProduct()
    {
        $product = DB::insert('insert into products (title, price, category, description, quantity) 
                             values (?, ?, ?, ?, ?)', ['computer', 1079, 'Mac', 'macBook pro', 1]);

        dd($product);
    }



    public function destroyProduct()
    {
        $id = 3;
        $product = DB::table('products')
            ->where('id', $id)
            ->delete();
        dd($product);
    }

    public function updateProduct()
    {
        $id = 2;
        $newPrice = 1099;
        DB::table('products')
        ->where('id', $id)
            ->update(array('price' => $newPrice));

    }
}
