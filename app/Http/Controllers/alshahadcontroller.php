<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class alshahadcontroller extends Controller
{
    public function index(){
        //return view('landpage');
        $products = Product::all();
       

      
    return view('landpage', compact('products'));

    }


/*    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product_details', compact('products'));*/
}

