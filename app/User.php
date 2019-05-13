<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;




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
        self::create([
                'name' => request('name'),
                'firstName' => request('firstName'), 
                'mail' => request('mail'),
                'password' => bcrypt(request('password')), //fonction de hachage de Laravel pour cacher le mdp
            ]);
    }

}
