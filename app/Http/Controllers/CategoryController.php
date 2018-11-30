<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;


class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
		$this->middleware('author')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $category = Category::all();
        return view('category.create')->withCategory($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        $category = New Category;
        $category->name = $request->name;

        $category->save();
        return back()->withInfo('berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $categories = Category::paginate(5);
        $tags = Tag::paginate(5);
        $categories2 = Category::find($id);
        $posts = Post::all();
        return view('category.show')->withTags($tags)->withPosts($posts)->withCategories($categories)->withCategories2($categories2);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;

        $category->save();
        return back()->withInfo('Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $category = Category::find($id);
       
       $category->delete();
       
       return back()->withInfo('Kategori di Hapus');
    }

}
