<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Storage;

class PostController extends Controller {

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
        $categories = Category::orderBy('id', 'desc')->paginate(1);
        $tags = Tag::orderBy('id', 'desc')->paginate(1);
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('blog.index')->withPosts($posts)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $posts = Post::all();
        $tags = Tag::all();
        $category = Category::all();
        return view('blog.create')->withCategories($category)->withTags($tags)->withPosts($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->slug = str_slug($posts->title);
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $destinationpath = public_path('images');
            $file->move($destinationpath, $filename);
            $posts->image = $filename;
        }

        $posts->save();
        $posts->tags()->sync($request->tags);
        return back()->withInfo('Post Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $tags = Tag::paginate(5);
        $categories = Category::paginate(5);
        $posts = Post::where('slug', '=', $slug)->first();
        return view('blog.show')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::find($id);
        return view('blog.edit')->withPosts($posts)->withCategories($categories)->withTags($tags);
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
            'title' => 'required|min:5',
            'content' => 'required',
        ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $destinationpath = public_path('/images');
            $file->move($destinationpath, $filename);
            $oldFilename = $posts->image;
            \Storage::delete($oldFilename);
            $posts->image = $filename;
        }
        $posts->save();
        $posts->tags()->sync($request->tags);
        return back()->withInfo('Post Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $posts = Post::find($id);
        Storage::delete($posts->image);
        $posts->tags()->detach();
        $posts->delete();
        return back()->withInfo("Data Berhasil di Delete");
    }

}
