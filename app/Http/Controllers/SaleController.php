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
            'wordingProduct' => ['bail', 'required','string'],
            'sale' => ['bail', 'required', 'int'],
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien
            
            $result = Sell::createSell(); // on crée la vente en premier car on relèvera une erreur si le stock n'est pas bon avec le trigger
            if($result){
                Product::saleProduct();
                return back()->with('response','La vente du produit ' . request('wordingProduct') . ' (x' . request('sale') . ' exemplaire) a été enregistré ');
            }
    		else{
                return back()->with('response','Le stock ne permet pas de faire cette vente');
            }
            
    		
    	}
    }
}
