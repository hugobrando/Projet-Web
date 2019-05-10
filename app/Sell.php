<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Sell extends Model
{
	protected $guard = ['idSell'];

    protected $fillable = ['idProduct','idUser','dateSale','quantity'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey = 'idProduct';
	protected $table ='Sell'; //pour ne pas rajouter de s a Sell(s) lorsque l'on fait une requete SQL

	public static function createSell(){
		Self::create([
            'idUser' => auth()->guard('user')->user()->idUser,
            'idProduct' => request('idProduct'),
            'dateSale' => Carbon::today()->toDateString(),
            'quantity' => request('sale'),
        ]);
	}

    public static function getAllSell(){ //donne toute les ventes avec le prenom et nom du vendeur par date decroissante
        return self::join('user', 'user.idUser', '=', 'sell.idUser')
                    ->join('product','product.idProduct','=','sell.idProduct')
                    ->orderBy('dateSale', 'desc') //la date la plus recente en premier
                    ->get(['dateSale','quantity','wordingProduct','name','firstName']);
    }

}
