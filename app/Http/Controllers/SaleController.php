<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SaleController extends Controller
{
    public function show(){
    	$products = Product::giveAllProductWithStock();
    	return view('/sale')->with(['products' => $products]);
    }

    public function saleProducts(Request $request){
    	if($request->has('saleProduct')){
    		Product::saleProduct();
    		return back();
    	}
    }
}
