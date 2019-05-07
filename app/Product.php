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


}
