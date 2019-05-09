<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{

    protected $guard = ['idOrder'];

    protected $fillable = ['idUser','idProduct','dateOrder','providerOrder','statusOrder','quantity','dateReceipt'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idOrder';
    protected $table ='Order'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function createOrderProduct($idUser){
		Self::create([
            'idUser' => $idUser,
            'idProduct' => request('idProduct'),
            'dateOrder' => Carbon::today()->toDateString(),
            'providerOrder' => request('nameProvider'),
            'statusOrder' => "En cours",
            'quantity' => request('order'),
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
                        ->get(['idOrder','order.idProduct','wordingProduct','dateOrder','providerOrder','quantity']);
    }

    public static function getOrderFinish(){
        return self::where('statusOrder','Terminée')
                        ->join('product', 'product.idProduct', '=', 'order.idProduct')
                        ->orderBy('dateReceipt', 'desc') //la date la plus recente en premier
                        ->get(['idOrder','wordingProduct','dateOrder','providerOrder','quantity','dateReceipt']);
    }


    public static function finishOrder(){
        // order finish
        self::where('idOrder',request('idOrder'))
            ->update(['statusOrder' =>'Terminée',
                    'dateReceipt' => Carbon::today()->toDateString(),
                    ]);

        // increment stock product
        
        Product::incrementProductById(request('idProduct'),request('quantity'));

    }


}

