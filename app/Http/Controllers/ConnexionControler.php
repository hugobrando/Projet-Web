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
            request()->validate([
            'id' => ['bail', 'required','int'],//on retournera un erreur comme quoi le champ est vide ou que ce n'est pas un entier sur la page 
            'mdp' => ['bail', 'required'], //on retournera un erreur comme quoi le champ est vide sur la page
            'mdpConfirm' => ['bail', 'required'],//on retournera un erreur comme quoi le champ est vide sur la page
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien et on renvoie une erreur

            $resultat = auth()->attempt([
                            'idUser' => request('id'),
                            'password' => request('mdp'),
                        ]);
            if($resultat){
                return redirect('/sale');

            }
            else{
                return back()->withErrors([
                    'connect' => "L'identifiant ou le mot de passe n'est pas le bon",
                ])
                        ->withInput(); //renvoie les input envoyés
            }
/*
        	if(User::connect()){
    			return redirect('/sale')->cookie('id', request('id'), 50);
        	}
        	else{
        		return back()->withErrors([
                    'connect' => "L'identifiant ou le mot de passe n'est pas le bon",
                ]);
        	}*/
    	}

    }

    public function deconnect(){
        auth()->logout();

        return redirect('/')->with('deconnect', 'Vous avez été déconnecté !');
    }
}
