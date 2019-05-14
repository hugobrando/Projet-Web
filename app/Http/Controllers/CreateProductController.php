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
    	$stock = Category::getCriticalStock($category);
    	return response()->json($stock);
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


	public function update(Request $request){
	    if ($request->has('update')) {
	    	request()->validate([
	    		'newWordingProduct' => ['bail', 'required','string'],
	            'newStockProduct' => ['bail', 'required','int','min:0'], 
	            'newCategory' => ['bail', 'required','string'],
	            'newCriticalStockProduct' => ['bail', 'required','int','min:0'],
	            'oldWordingProduct' => ['bail', 'required','string'],
	            'oldStockProduct' => ['bail', 'required','int','min:0'], 
	            'oldCategory' => ['bail', 'required','string'],
	            'oldCriticalStockProduct' => ['bail', 'required','int','min:0'],
	    	]);

	    	Product::updateProduct();
	    	return back()->with('create', 'Le produit ' . request('newWordingProduct') . ' a été modifé !');
		}

    }

    public function getProducts($category)
    {
		$products = Category::getAllProductOfThisCategory($category);
    	return response()->json($products);
    }

    public function getProduct($product)
    {
		$result = Product::getProductByWordingProduct($product);
    	return response()->json($result);
    }

    public function getCategories(){
    	$categories = Category::getAllCategory();
    	return response()->json($categories);
    }
}
