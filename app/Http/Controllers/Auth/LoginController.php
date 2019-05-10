<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:boss')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function showForm(){
        return view('connexion');
    }

    public function selectForm(Request $request){
            if(request('admin')){ // on identifie un boss
                return $this->bossLogin($request);
            }
            else{ //on identifie un user
                return $this->userLogin($request);
            }
    }

    public function bossLogin(Request $request){
        request()->validate([
            'id' => ['bail', 'required','int'],//on retournera un erreur comme quoi le champ est vide ou que ce n'est pas un entier sur la page 
            'mdp' => ['bail', 'required'], //on retournera un erreur comme quoi le champ est vide sur la page
            'mdpConfirm' => ['bail', 'required'],//on retournera un erreur comme quoi le champ est vide sur la page
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien et on renvoie une erreur

        $resultat = auth()->guard('boss')->attempt([
                                                'idBoss' => request('id'),
                                                'password' => request('mdp'),
                                            ]);

        if($resultat){
                return redirect('/order');

            }
        else{
            return back()->withErrors([
                 'connect' => "L'identifiant ou le mot de passe n'est pas le bon",
            ])
                    ->withInput(); //renvoie les input envoyés
        }
    }

    public function userLogin(Request $request){
        request()->validate([
            'id' => ['bail', 'required','int'],//on retournera un erreur comme quoi le champ est vide ou que ce n'est pas un entier sur la page 
            'mdp' => ['bail', 'required'], //on retournera un erreur comme quoi le champ est vide sur la page
            'mdpConfirm' => ['bail', 'required'],//on retournera un erreur comme quoi le champ est vide sur la page
            ]); //on verifie que les champs ne sont pas vides, si ils le sont on ne fait rien et on renvoie une erreur

        $resultat = auth()->guard('user')->attempt([
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
    }
}
