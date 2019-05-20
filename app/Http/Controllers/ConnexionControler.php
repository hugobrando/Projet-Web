<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boss;

class ConnexionControler extends Controller
{
    
    public function deconnect(Request $request){
        if(auth()->guard('user')->check()){ //si l'utilisateur est connecté en tant que user 
        
        auth()->guard('user')->logout();
        $request->session()->flush(); //efface toutes les informations
        $request->session()->regenerate(); // modifie l'identifiant de session

       }
       else{ // sin non c'est un boos

        auth()->guard('boss')->logout();
        $request->session()->flush(); //efface toutes les informations
        $request->session()->regenerate(); // modifie l'identifiant de session
       } 

        return redirect('/')->with('deconnect', 'Vous avez été déconnecté !');
    }
}
