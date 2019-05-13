<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ignore;

class IgnoreProductController extends Controller
{
    public function show(){
    	$products = Ignore::getIgnoreProduct();
    	return view('/ignoreProduct')->with(['products' => $products]);
    }
    public function ignoreProduct(Request $request){
    	if($request->has('newReasonProduct')){
            request()->validate([
            'reasonIgnore' => ['bail','string'],
            'name' => ['bail', 'required','string'], 
            'firstName' => ['bail', 'required', 'string'],
            'wordingProduct' => ['bail','required','string'],
            ]);

    		Ignore::updateIgnore();
    		return back()->with('response', 'La raison a été enregistrée !');
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
