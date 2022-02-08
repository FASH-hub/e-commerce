<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;
use App\Models\Products;

class ProdController extends Controller
{

    /*
    * ------------------------------------
    * Displays all the products registered
    * ------------------------------------
    */
    function displayProduct()
    {
        return Products::all();
    }



    /*
    * ------------------------------------------------
    * creates a new product in the database
    * ------------------------------------------------
    */
    public function addProduct(Request $request)
    {

        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;;
        $product->description = $request->description;
        $result = $product->save();

        if ($result) {
            return ["item" => "has been added"];
        } else {
            return ["item" => "has not been added"];
        }
    }



    /**
     * ----------------------------------
     * Delete a product from database.
     * ----------------------------------
     */
    public function destroyProduct($id)
    {
        $dproduct = Products::find($id);
        $resutl = $dproduct->delete();

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

    public function updateProduct(Request $request, $id)
    {

        $uproduct = Products::find($id);
        $uproduct->title = $request->title;
        $uproduct->price = $request->price;
        $uproduct->description = $request->description;
        $uproduct->category = $request->category;
        $uproduct->image = $request->image;
        $item = $uproduct->save();
        if ($item) {
            return ["item" => " updated"];
        } else {
            return ["item" => " couldn't be updated"];
        }
    }
}
