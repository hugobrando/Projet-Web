<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Boss extends Authenticatable
{   
    use Notifiable;

    protected $guard = 'boss';

    protected $fillable = ['name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idBoss';
    protected $table ='Boss'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

	public static function createBoss(){
	        return self::create([
	                'name' => request('name'),
	                'firstName' => request('firstName'), 
	                'mail' => request('mail'),
	                'password' => bcrypt(request('password')), //fonction de hachage de Laravel pour cacher le mdp
	            ]);
	    }
 
}
