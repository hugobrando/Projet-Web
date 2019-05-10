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
	    		Boss::createBoss();
	    		return back()->with('create', 'Le boss ' . request('name') . ' '  . request('firstName') . ' a été créé !');
	    	}
	    	else{ //on crée un user
	    		User::createUser();
	    		return back()->with('create', "L'employé " . request('name') . ' '  . request('firstName') . ' a été créé !');
	    	}
	    }

    }
}
