<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Log;




class User extends Authenticatable 
{   
    use Notifiable;

    protected $guard = 'user';

    protected $fillable = ['idUser','name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idUser';
    protected $table ='User'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


    public static function createUser(){
        // faire un try catch car il y a possibilité d'erreur vis a vis du trigger fait dans la base de donnée
        try{
            self::create([
                'name' => request('name'),
                'firstName' => request('firstName'), 
                'mail' => request('mail'),
                'password' => bcrypt(request('password')), ///fonction de cryptage pour cacher le mdp
            ]);
            return true;
        }
        catch(\Exception $exeption)
        {
            Log::error('Il existe déja un employé avec ce nom et prenom');
            return false;
        }
    }

}
