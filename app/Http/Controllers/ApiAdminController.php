<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiAdminController extends Controller
{
    public function __construct(User $user){
		$this->user = $user;
		$this->middleware('admin');
	}
	
	public function index(){
		return $this->user->all();
	}
	
	public function show($id){
		$data = $this->user->where('id','=',$id)->get();
		return response()->json(compact('data'),200);
	}
}
