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
    protected $table ='user'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


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

    public static function updateUser(){
        // faire un try catch car il y a possibilité d'erreur vis a vis du trigger fait dans la base de donnée
        try{
            self::where('idUser', request('id'))
            ->update(['name' => request('name'),
                    'firstName' => request('firstName'),
                    'mail' => request('mail'),
                    ]);
            return true;
        }
        catch(\Exception $exeption)
        {
            Log::error('Il existe déja un employé avec ce nom et prenom');
            return false;
        }
    }

    public static function updateUserPassword(){
        self::where('idUser', request('id'))
            ->update(['password' => bcrypt(request('password')), //fonction de cryptage pour cacher le mdp
                    ]);
    }


    public static function getEmployees(){
        return self::orderby('firstName')
                    ->orderby('name')
                    ->get(['idUser','name','firstName']);
    }

    public static function getEmployee($id){
        return self::where('idUser',$id)
                    ->get(['idUser','name','firstName','mail']);
    }

    public static function getIdUserByNameAndFirstName($name,$firstName){
        $user = self::where('name',$name)
                    ->where('firstName',$firstName)
                    ->first();
        return $user->idUser;
    }
}
