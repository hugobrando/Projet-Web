<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Category;

class Product extends Model
{


	protected $guard = ['idProduct'];

    protected $fillable = ['wordingProduct','stockProduct','criticalStockProduct','idCategory'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey = 'idProduct';
    protected $table ='Product'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function createProduct(){
        $category = Category::getIdProductByWordingCategory(request('category'));
        self::create([
                'wordingProduct' => request('wordingProduct'),
                'stockProduct' => request('stock'), 
                'criticalStockProduct' => request('criticalStock'),
                'idCategory' => $category, 
            ]);
    }

    public static function giveAllProductWithStock(){
    	$allProducts = self::where('stockProduct', '!=' ,0)
    			->get(['wordingProduct','stockProduct']);
        $result = [];
        foreach($allProducts as $element){
            $sumOrderQuantity = Order::getOrderQuantityById($element->idProduct);
            $element->order = $sumOrderQuantity; //rajoute le nombre de produit en commande pour ce produit
            $result[] = $element;
        }
        return $result;
    }

    public static function giveAllProduct(){
    	return self::get(['idProduct','wordingProduct','stockProduct']);
    }

    public static function saleProduct(){
    	self::where('wordingProduct',request('wordingProduct'))
                ->where('stockProduct','>=',(int)request('sale'))  // pour ne jamais avoir de stock negatif
    			->decrement('stockProduct', (int)request('sale'));
    }

    // un produit doit potentiellement etre commander si son stock est inferieur ou égal a son stock critique
    public static function productWithCriticalStock(){ 
    	$allProducts = self::get();
    	$result = [];
		foreach($allProducts as $element){
            $sumOrderQuantity = Order::getOrderQuantityById($element->idProduct);
			if(($element->stockProduct + $sumOrderQuantity) <= $element->criticalStockProduct){
                $element->order = $sumOrderQuantity; //rajoute le nombre de produit en commande pour ce produit
				$result[] = $element;
			}
		}
		return $result;
    }

    public static function productWithStockOk(){ 
        $allProducts = self::get();
        $result = [];
        foreach($allProducts as $element){
            $sumOrderQuantity = Order::getOrderQuantityById($element->idProduct);
            if(($element->stockProduct + $sumOrderQuantity) > $element->criticalStockProduct){
                $element->order = $sumOrderQuantity; //rajoute le nombre de produit en commande pour ce produit
                $result[] = $element;
            }
        }
        return $result;
    }

    public static function incrementProductById($idProduct,$quantity){        
        return self::where('idProduct',$idProduct)
                ->increment('stockProduct', $quantity);
    }

    public static function getIdProductByWordingProduct($wordingProduct){
        $product = self::where('wordingProduct',$wordingProduct)->firstOrFail();
        return $product->idProduct;
    }
}
