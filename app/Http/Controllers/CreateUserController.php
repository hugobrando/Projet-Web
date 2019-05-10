<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

	    	User::createUser();

	    	return 'ok';
	    }

    }
}
