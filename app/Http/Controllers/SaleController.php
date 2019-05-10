<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sell;
class SaleController extends Controller
{
    public function show(){
       
    	$products = Product::giveAllProductWithStock();
    	return view('/sale')->with(['products' => $products]);
    }

    public function saleProduct(Request $request){
    	if($request->has('saleProduct')){

            request()->validate([
            'idProduct' => ['bail', 'required'],
            'sale' => ['bail', 'required', 'int'],
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien

    		Product::saleProduct();
            Sell::createSell();
    		return back();
    	}
    }
}
