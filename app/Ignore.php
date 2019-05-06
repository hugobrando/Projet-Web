<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ignore extends Model
{

    protected $guard = ['idProduct','idUser'];

    protected $fillable = ['reasonIgnore','endDateIgnore'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey =['idProduct','idUser'];
}
