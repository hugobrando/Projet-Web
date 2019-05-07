<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guard = ['idUser','idProduct'];

    protected $fillable = ['dateOrder','providerOrder','statusOrder'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey =['idUser','idProduct'];
    protected $table ='Order'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

}
