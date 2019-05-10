<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boss;

class ConnexionControler extends Controller
{
    
    public function deconnect(){
        auth()->guard('boss')->logout();
        auth()->guard('user')->logout();


        return redirect('/')->with('deconnect', 'Vous avez été déconnecté !');
    }
}
