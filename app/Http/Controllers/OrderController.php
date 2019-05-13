<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Ignore;


class OrderController extends Controller
{
    public function show(){
    	$products = Product::productWithCriticalStock();
        $stockOk = Product::productWithStockOk();	
    	return view('/order')->with(['products' => $products, 'stockOk' => $stockOk]);
    }

    public function orderProduct(Request $request){

		if($request->has('orderProduct')){
            request()->validate([
            'wordingProduct' => ['bail', 'required','string'],
            'nameProvider' => ['bail', 'required'], //on retournera un erreur comme quoi le champ est vide sur la page
            'order' => ['bail', 'required', 'int','min:0'],
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien et on renvoie une erreur

    		Order::createOrderProduct();
    		return back()->with('response', 'La commande a été enregistrée !');
    	}
        else if($request->has('ignoreProduct')){ //on veut ignorer un produit
            request()->validate([
            'wordingProduct' => ['bail', 'required','string'],
            ]);

            Ignore::createIgnore();
            return back()->with('response', 'Le produit ' . request('wordingProduct') . ' a été ignoré !');
        }
    }
}

