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
	    			$id = Boss::getIdBossByNameAndFirstName(request('name'),request('firstName'));
	    			return back()->with('create', "Le boss " . request('name') . ' '  . request('firstName') . ' a été créé !')
	    							->with('account',"L'identifiant est : " . $id . " et le mot de passe est : " . request('password'));
	    		}
	    		else{
	    			return back()->with('create', "Il existe déja un boss avec ce nom et prenom !");
	    		}
	    	}
	    	else{ //on crée un user
	    		$result = User::createUser();
	    		if($result){
	    			$id = User::getIdUserByNameAndFirstName(request('name'),request('firstName'));
	    			return back()->with('create', "L'employé " . request('name') . ' '  . request('firstName') . ' a été créé !')
	    							->with('account',"L'identifiant est : " . $id . " et le mot de passe est : " . request('password'));
	    		}
	    		else{
	    			return back()->with('create', "Il existe déja un employé avec ce nom et prenom !");
	    		}
	    		
	    	}
	    }

    }

    public function getBoss(){
    	$boss = Boss::getBoss();
    	return response()->json($boss);
    }

    public function edit(Request $request){
    	if ($request->has('update')) {
    		if ($request->has('boss') and !($request->has('employee'))) {
    			if($request->has('password')){
    				request()->validate([
			    		'id' => ['bail', 'required','int','min:0'],
			            'password' => ['bail','required','confirmed'],
			            'password_confirmation' =>['bail','required'],
			    	]);

    				Boss::updateBossPassword();
    				return back()->with('create', 'Votre nouveau mot de passe est : ' . request('password') . ' !');
    			}
    			else{
	    			request()->validate([
			    		'name' => ['bail', 'required','string'],
			            'firstName' => ['bail', 'required','string'], 
			            'mail' => ['bail', 'required','email'],
			            'id' => ['bail','required','int','min:1'],
			    	]);

			    	$result = Boss::updateBoss();
			    	if($result){
			    		return back()->with('create', 'Vous avez modifié vos informations !');
			    	}
			    	else{
			    		return back()->with('create', "Il existe déja un boss avec ce nom et prenom !");
			    	}
		    		
    			}

	    	}
	    	else if ($request->has('employee') and !($request->has('boss'))) {
    			if($request->has('password')){
    				request()->validate([
			    		'id' => ['bail', 'required','int','min:0'],
			            'password' => ['bail','required','confirmed'],
			            'password_confirmation' =>['bail','required'],
			    	]);

    				User::updateUserPassword();
    				return back()->with('create', 'Le nouveau mot de passe est : ' . request('password') . ' !');
    			}
    			else{
	    			request()->validate([
			    		'name' => ['bail', 'required','string'],
			            'firstName' => ['bail', 'required','string'], 
			            'mail' => ['bail', 'required','email'],
			            'id' => ['bail','required','int','min:1'],
			    	]);

			    	$result = User::updateUser();
			    	if($result){
			    		return back()->with('create', 'Vous avez modifié les informations de ' . request('name') . ' ' . request('firstName') . ' !');
			    	}
			    	else{
			    		return back()->with('create', "Il existe déja un employé avec ce nom et prenom !");
			    	}
		    		
    			}

	    	}
	    }
    }

    public function getEmployees(){
    	$employees = User::getEmployees();
    	return response()->json($employees);
    }

    public function getEmployee($id){
    	$employee = User::getEmployee($id);
    	return response()->json($employee);
    }
}
