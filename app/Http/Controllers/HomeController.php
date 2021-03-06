<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories =Category::orderBy('id','desc')->paginate(5);
		$tags = Tag::orderBy('id','desc')->paginate(5);
		$posts = Post::orderBy('id','desc')->paginate(6);
		return view('home')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }
}
