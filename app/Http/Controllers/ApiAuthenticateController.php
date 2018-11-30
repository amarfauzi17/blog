<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Hash;

class ApiAuthenticateController extends Controller
{
    public function __construct(User $user){
		$this->user =$user;
	}
	
	public function login(Request $request){
		$cek = $request->only(['email','password']);
		
		if(!$token = JWTAuth::attempt($cek)){
			return response()->json(['error' => 'invalid token'], 401);
		}
		
		return response()->json(compact('token'));
	}
	
	public function register(Request $request){
		$cek = $request->only(['name','email','password']);
		$cek = [
			'name' => $cek['name'],
			'email' => $cek['email'],
			'password' => Hash::make($cek['password']),
			'level' => 'user',
		];
		
		try{
			$user = $this->user->create($cek);
		}catch (Exception $e){
			return response()->json(['error' => 'User already exists'],409);
		}
		
		$token = JWTAuth::fromUser($user);
		return response()->json(compact('token'));
	}
}
