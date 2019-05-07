<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Boss extends Authenticatable
{

    protected $guard = ['idUser'];

    protected $fillable = ['name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idUser';
    protected $table ='Boss'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

}
