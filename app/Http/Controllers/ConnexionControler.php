<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boss;

class ConnexionControler extends Controller
{
    
    public function deconnect(){
        if(auth()->guard('user')->check()){ //si l'utilisateur est connecté en tant que user 
        
        auth()->guard('user')->logout();
       }
       else{ // sin non c'est un boos

        auth()->guard('boss')->logout();
       } 

        return redirect('/')->with('deconnect', 'Vous avez été déconnecté !');
    }
}
