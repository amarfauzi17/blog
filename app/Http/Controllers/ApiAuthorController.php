<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ApiAuthorController extends Controller
{
	public function __construct(Post $post){
		$this->post = $post;
		$this->middleware('author');
	}
	
	public function index(){
		return $this->post->all();
	}
	
	public function show($id){
		$data = $this->post->where('id','=',$id)->get();
		return response()->json(compact('data'),200);
	}
}
