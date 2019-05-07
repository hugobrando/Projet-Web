<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConnexionControler extends Controller
{
    public function show(){
    	return view('connexion');
    }

    public function connect(Request $request){
        if ($request->has('connect')) {
        	if(User::connect()){
    			return view('sale');
        	}
        	else{
        		return back()->withErrors([
                    'connect' => "L'identifiant ou le mot de passe n'est pas le bon",
                ]);
        	}
    	}
    }
}
