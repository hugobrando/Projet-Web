<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CreateProductController extends Controller
{
    public function show(){
    	$allCategory = Category::getAllCategory();
    	return view('createProduct')->with(['allCategory' => $allCategory]);
    }

    public function getCriticalStock($category){
    	return Category::getCriticalStock($category);
    }

    // todo création du produit plus prendre en compte si une commande est en cours
}
