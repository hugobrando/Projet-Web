<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;

class CreateProductController extends Controller
{
    public function show(){
    	$allCategory = Category::getAllCategory();
    	return view('createProduct')->with(['allCategory' => $allCategory]);
    }

    public function getCriticalStock($category){
    	return Category::getCriticalStock($category);
    }

    public function create(Request $request){
    	if ($request->has('create')) {
	    	request()->validate([
	    		'wordingProduct' => ['bail', 'required','string'],
	            'stock' => ['bail', 'required','int','min:0'], 
	            'category' => ['bail', 'required','string'],
	            'criticalStock' => ['bail','required','int'],
	    	]);

	    	Product::createProduct();

	    	if(request('order')){ // on crée la commande corespondante
	    		Order::createOrderOfThisProduct();
	    		return back()->with('create', 'Le produit ' . request('wordingProduct') . ' a été créé ainsi que sa Commande !');
	    	}
	    	else{
	    		return back()->with('create', 'Le produit ' . request('wordingProduct') . ' a été créé !');
	    	}
	    }

    }
}
