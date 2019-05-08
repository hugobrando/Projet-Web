<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;


class OrderController extends Controller
{
    public function show(){
    	$products = Product::productWithCriticalStock();	
    	return view('/order')->with(['products' => $products]);
    }

    public function orderProduct(Request $request){
        $id = $request->cookie('id');

		if($request->has('orderProduct')){
            request()->validate([
            'idProduct' => ['bail', 'required'],
            'nameProvider' => ['bail', 'required'],
            'order' => ['bail', 'required', 'int'],
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien

    		Order::createOrderProduct($id);
    		return back();
    	}


    }
}

