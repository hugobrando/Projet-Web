<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class OrderController extends Controller
{
    public function show(){
    	$products = Product::productWithCriticalStock();	
    	return view('/order')->with(['products' => $products]);
    }
}

