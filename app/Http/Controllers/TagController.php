<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Category;

class TagController extends Controller {

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
        $tags = Tag::orderBy('id','asc')->paginate(5);
        return view('tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tags = Tag::all();
        return view('tags.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $tags = New Tag;

        $tags->name = $request->name;
        $tags->save();

        return back()->withInfo('Tag berhasil Di Buat');
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
        $tags2 = Tag::find($id);
        $posts = Post::all();
        return view('tags.show')->withTags($tags)->withPosts($posts)->withCategories($categories)->withTags2($tags2);
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

        $tags = Tag::find($id);
        $tags->name = $request->name;

        $tags->save();
        return back()->withInfo('Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tags = Tag::find($id);

        $tags->delete();

        return back()->withInfo('Kategori di Hapus');
    }

}
