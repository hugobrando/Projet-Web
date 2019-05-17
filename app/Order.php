<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{

    protected $guard = ['idOrder'];

    protected $fillable = ['idBoss','idProduct','dateOrder','providerOrder','statusOrder','quantity','dateReceipt'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idOrder';
    protected $table ='order'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function createOrderProduct(){
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
		Self::create([
            'idBoss' => auth()->guard('boss')->user()->idBoss,
            'idProduct' => $idProduct,
            'dateOrder' => Carbon::today()->toDateString(),
            'providerOrder' => request('nameProvider'),
            'statusOrder' => "En cours",
            'quantity' => request('order'),
        ]);
    }

    public static function createOrderOfThisProduct(){
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
        
        Self::create([
            'idBoss' => auth()->guard('boss')->user()->idBoss,
            'idProduct' => $idProduct,
            'dateOrder' => Carbon::today()->toDateString(),
            'providerOrder' => request('nameProvider'),
            'statusOrder' => "En cours",
            'quantity' => request('orderProduct'),
        ]);
    }


    //la quantité de tout les commande en cours pour ce produit
    public static function getOrderQuantityById($idProduct){
        return self::select('quantity')
                    ->where('idProduct',$idProduct)
                    ->where('statusOrder','En cours')
                    ->sum('quantity');
    }

    public static function getOrderEnCours(){
        return self::where('statusOrder','En cours')
                        ->join('product', 'product.idProduct', '=', 'order.idProduct')
                        ->get(['wordingProduct','dateOrder','providerOrder','quantity']);
    }

    public static function getOrderFinish(){
        return self::where('statusOrder','Terminée')
                        ->join('product', 'product.idProduct', '=', 'order.idProduct')
                        ->orderBy('dateReceipt', 'desc') //la date la plus recente en premier
                        ->get(['wordingProduct','dateOrder','providerOrder','quantity','dateReceipt']);
    }


    public static function finishOrder(){
        // order finish
        $idProduct = Product::getIdProductByWordingProduct(request('wordingProduct'));
        self::where('idProduct',$idProduct)
            ->where('dateOrder',request('dateOrder'))
            ->where('providerOrder',request('providerOrder'))
            ->where('quantity',request('quantity'))
            ->first()
            ->update(['statusOrder' =>'Terminée',
                    'dateReceipt' => Carbon::today()->toDateString(),
                    ]);

        // increment stock product
        
        Product::incrementProductById($idProduct,request('quantity'));

    }


}

