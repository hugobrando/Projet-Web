<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;

class Boss extends Authenticatable
{   
    use Notifiable;

    protected $guard = 'boss';

    protected $fillable = ['idBoss','name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idBoss';
    protected $table ='boss'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL

	public static function createBoss(){
		// faire un try catch car il y a possibilité d'erreur vis a vis du trigger fait dans la base de donnée
        try{
		    self::create([
		            'name' => request('name'),
		            'firstName' => request('firstName'), 
		            'mail' => request('mail'),
		            'password' => bcrypt(request('password')), //fonction de cryptage pour cacher le mdp
		        ]);
		    return true;
        }
        catch(\Exception $exeption)
        {
            Log::error('Il existe déja un boss avec ce nom et prenom');
            return false;
        }
	}

	public static function updateBoss(){
		// faire un try catch car il y a possibilité d'erreur vis a vis du trigger fait dans la base de donnée
        try{
        	self::where('idBoss', request('id'))
            ->update(['name' => request('name'),
                    'firstName' => request('firstName'),
                    'mail' => request('mail'),
                    ]);
		    return true;
        }
        catch(\Exception $exeption)
        {
            Log::error('Il existe déja un boss avec ce nom et prenom');
            return false;
        }
	}

	public static function updateBossPassword(){
		self::where('idBoss', request('id'))
            ->update(['password' => bcrypt(request('password')), //fonction de cryptage pour cacher le mdp
                    ]);
	}
 
 	public static function getIdBossByNameAndFirstName($name,$firstName){
 		$boss = self::where('name',$name)
 					->where('firstName',$firstName)
 					->first();
        return $boss->idBoss;
 	}

 	public static function getBoss(){
 		return self::where('idBoss',auth()->guard('boss')->user()->idBoss)
 					->get(['idBoss','name','firstName','mail']);
 	}
}
