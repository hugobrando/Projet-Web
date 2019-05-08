<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


	protected $guard = ['idProduct'];

    protected $fillable = ['workingPorduct','stockProduct','criticalStockProduct','idCategory'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey = 'idProduct';
    protected $table ='Product'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function giveAllProductWithStock(){
    	return self::where('stockProduct', '!=' ,0)
    			->get(['idProduct','wordingProduct','stockProduct']);
    }

    public static function giveAllProduct(){
    	return self::get(['idProduct','wordingProduct','stockProduct']);
    }

    public static function saleProduct(){
    	self::where('idProduct',request('idProduct'))
    			->decrement('stockProduct', (int)request('sale'));
    }

    // un produit doit potentiellement etre commander si son stock est inferieur ou égal a son stock critique
    public static function productWithCriticalStock(){ 
    	$allProducts = self::get();
    	$result = [];
		foreach($allProducts as $element){
			if($element->stockProduct <= $element->criticalStockProduct){
				$result[] = $element;
			}
		}
		return $result;
    }
}
