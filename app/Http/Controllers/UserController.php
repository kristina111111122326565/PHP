<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
class UserController extends Controller
{
    public function signUp(Request $req)
	{
		$validator = Validator::make($req->all(), [
			"name" => "required",
			"surname" => "required",
			"login" => "required",
			"password" => "required|min:8",
		]);
		if($validator->fails()) 
		{
			return response()->json(
				[
					"message" => $validator->errors(),
				]);
		}
			
		User::create($req->all());

		return response()->json("Vsё Ok!");
	}

	public function signIn(Request $req)
	{
		$validator = Validator::make($req->all(), [
			"login" => "required",
			"password" => "required",
		]);

		if($validator->fails()) 
		{
			return response()->json(
				[
					"message" => $validator->errors(),
				]);
		}

		$user = User::where("login", $req->login)->first();

		if($user)
		{
			if($req->password && $user->password)
			{
				$user->api_token = Str::random(50);
				$user->save();
				return response()->json(
					[
						"api_token" => $user->api_token, 
					]
				);
			}
		}
		return response()->json(
			[
				"message"=>"Вы не зарегистрированы",
			]
		);
	}

	public function output(Request $output){
		$validator = Validator::make($output->all(), [
			"login" => "required",
		]);
		$user = User::where("login", $output->login)->first();
		if($user->api_token != null)
		{
			$user->api_token = null;
			$user->save();
			return response()->json(
			[
				"message"=>"Вы вышли",
			]
		);
		}

	}

	public function reset_password(Request $reset){
		$validator = Validator::make($reset->all(), [
			"login" => "required",
		]);

		$user = User::where("login", $reset->login)->first();

		if ($user) 
		{
			$new_password = Validator::make($reset->all(), [
			"password" => "required|min:8",
			]);
			$user->password = $reset->password;
			$user->save();
			return response()->json(
					[
						"password" => $user->password, 
					]
				);
		}

		return respons()->json("Логин не существует");
	}
}
	