<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guard = ['idCategory'];

    protected $fillable = ['wordingCategory','criticalStockCategory'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idCategory';
    protected $table ='Category'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


    public static function getAllCategory(){
    	return self::orderby('wordingCategory')
    				->get(['wordingCategory']);
    }

    public static function getCriticalStock($category){
    	return self::where('wordingCategory',$category)
    					->get(['criticalStockCategory'])
    					->sum('criticalStockCategory');
    }
}
