<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product ;

class Category extends Model
{

    protected $guard = ['idCategory'];

    protected $fillable = ['wordingCategory','criticalStockCategory'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idCategory';
    protected $table ='category'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


    public static function getAllCategory(){
    	return self::orderby('wordingCategory')
    				->get(['wordingCategory']);
    }

    public static function getCriticalStock($category){
    	$cat = self::where('wordingCategory',$category)->firstOrFail();
    	return $cat->criticalStockCategory;
    }

    public static function getIdCategoryByWordingCategory($category){
    	$cat = self::where('wordingCategory',$category)->firstOrFail();
    	return $cat->idCategory;
    }

    public static function  getAllProductOfThisCategory($category){
        return self::where('wordingCategory',$category)
                    ->join('product','product.idCategory','=','category.idCategory')
                    ->get(['wordingProduct']);
    }

    public static function createCategory(){
        self::create([
                'wordingCategory' => request('wordingCategory'),
                'criticalStockCategory' => request('criticalStockCategory'), 
            ]);
    }

    public static function updateCategory(){
        self::where('wordingCategory',request('oldCategory'))
            ->firstOrFail()  // pour ne rien faire si entre temps qqun a changé le nom de la categorie
            ->update(['wordingCategory' => request('newCategory'),
                        'criticalStockCategory' => request('newCriticalStockCategory'),
                    ]);
    }

}
