<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $guard = ['idUser'];

    protected $fillable = ['name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idUser';
}
