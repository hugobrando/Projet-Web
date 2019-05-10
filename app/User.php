<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class User extends Model implements Authenticatable
{   
    use BasicAuthenticatable;

    protected $guard = 'employee';

    protected $fillable = ['name','firstName','mail','password'];
    protected $hidden = ['password'];

    public $timestamps = false; // pour ne pas avoir de colonne supplementaire (updated_at)
    protected $primaryKey ='idUser';
    protected $table ='User'; // //pour ne pas rajouter de s a la table lorsque l'on fait une requete SQL


    public static function createUser(){
        return self::create([
                'name' => request('name'),
                'firstName' => request('firstName'), 
                'mail' => request('mail'),
                'password' => bcrypt(request('password')), //fonction de hachage de Laravel pour cacher le mdp
            ]);
    }

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
