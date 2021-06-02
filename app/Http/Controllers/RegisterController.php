<?php

namespace App\Http\Controllers;
use App\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
    	$valid = $request->validate([
		    "login"  => 'required',
		    "passowrd"  => 'required',
    	]);
    	$user = new Register();
    	$user->login = $request->input('login');
    	$user->password = $request->input('password');  
    	$user->save();
    	dd('hello');
    }
}
