<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Ignore extends Model
{

    protected $guard = ['idProduct','idBoss'];

    protected $fillable = ['idProduct','idBoss','reasonIgnore'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $table ='ignore'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function createIgnore(){
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
    	Self::insert([
            'idBoss' => auth()->guard('boss')->user()->idBoss,
            'idProduct' => $idProduct,
        ]);
    }

    public static function getIgnoreProduct(){
        return self::join('product', 'product.idProduct', '=', 'ignore.idProduct')
                    ->join('boss','ignore.idBoss','=','boss.idBoss')
                    ->get(['boss.name','boss.firstName','product.wordingProduct','product.stockProduct','reasonIgnore']);
    }

    public static function updateIgnore(){ 
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
        $idBoss = Boss::getIdBossByNameAndFirstName(request('name'),request('firstName'));
        self::where('idProduct',$idProduct)
            ->where('idBoss',$idBoss)
            ->update(['reasonIgnore' => request('reasonIgnore')]);
    }

    public static function deleteIgnore(){ 
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
        $idBoss = Boss::getIdBossByNameAndFirstName(request('name'),request('firstName'));
        self::where('idProduct',$idProduct)
            ->where('idBoss',$idBoss)
            ->delete();
    }
}
