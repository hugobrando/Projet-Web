<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class EditCategoryController extends Controller
{
    public function show(){
    	$allCategory = Category::getAllCategory();
    	return view('editCategory')->with(['allCategory' => $allCategory]);
    }

    public function createCategory(Request $request){
    	if ($request->has('create')) {
	    	request()->validate([
	    		'wordingCategory' => ['bail', 'required','string'],
	            'criticalStockCategory' => ['bail', 'required','int','min:0'], 
	    	]);

	    	Category::createCategory();
	    	return back()->with('create', 'La categorie ' . request('wordingCategory') . ' a été créée !');
	    }
    }

    public function updateCategory(Request $request){
    	if ($request->has('update')) {
	    	request()->validate([
	    		'oldCategory' => ['bail', 'required','string'],
	    		'newCategory' => ['bail', 'required','string'],
	            'newCriticalStockCategory' => ['bail', 'required','int','min:0'], 
	    	]);
	    	
	    	Category::updateCategory();
	    	return back()->with('create', 'La categorie ' . request('newCategory') . ' a été modifiée !');
	    }
    }
}
