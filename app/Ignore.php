<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ignore extends Model
{

    protected $guard = ['idProduct','idBoss'];

    protected $fillable = ['reasonIgnore'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey =['idProduct','idBoss'];
    protected $table ='Ignore'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

    public static function createIgnore(){
    	Self::create([
            'idBoss' => auth()->guard('boss')->user()->idBoss,
            'idProduct' => request('idProduct'),
            'reasonIgnore' => request('reasonIgnore'),
        ]);
    }
}
