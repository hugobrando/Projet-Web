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
    protected $table ='User'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


    public static function connect(){
        if(!(empty(request('id')))){
            $user = self::where('idUser',request('id'))->firstOrFail();
            if(!(empty($user))){
                if($user->password == request('mdp')){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    	else{
    		return false;
    	}
    }
}
