<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


	protected $guard = ['idProduct'];

    protected $fillable = ['workingPorduct','stockProduct','criticalStockProduct','idCategory'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey = 'idProduct';

}
