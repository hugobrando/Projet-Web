<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
	protected $guard = ['idProduct','idUser'];

    protected $fillable = ['dateSale'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey = 'idProduct';
	protected $table ='Sell'; //pour ne pas rajouter de s a Sell(s) lorsque l'on fait une requete SQL

}
