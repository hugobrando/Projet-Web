<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boss;

class CreateUserController extends Controller
{
    public function show(){
    	return view('createUser');
    }

    public function create(Request $request){
        if ($request->has('create')) {
	    	request()->validate([
	    		'name' => ['bail', 'required','string'],
	            'firstName' => ['bail', 'required','string'], 
	            'mail' => ['bail', 'required','email'],
	            'password' => ['bail','required','confirmed'],
	            'password_confirmation' =>['bail','required'],
	    	]);

	    	if(request('admin')){ // on crée un boss
	    		$result = Boss::createBoss();
	    		if($result){
	    			return back()->with('create', "Le boss " . request('name') . ' '  . request('firstName') . ' a été créé !');
	    		}
	    		else{
	    			return back()->with('create', "Il existe déja un boss avec ce nom et prenom !");
	    		}
	    	}
	    	else{ //on crée un user
	    		$result = User::createUser();
	    		if($result){
	    			return back()->with('create', "L'employé " . request('name') . ' '  . request('firstName') . ' a été créé !');
	    		}
	    		else{
	    			return back()->with('create', "Il existe déja un employé avec ce nom et prenom !");
	    		}
	    		
	    	}
	    }

    }
}
