<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class listUserController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
		$this->middleware('admin');
    }
	
    public function index() {
        $users = User::all();
        return view('listuser')->withUsers($users);
    }
	
	public function destroy($id) {
        $users = User::find($id);
        $users->delete();
        return back()->withInfo("Data Berhasil di Delete");
    }
	
	public function update(Request $request, $id) {
        $users = User::find($id);
        $users->level= $request->level;
        $users->save();
        return back()->withInfo('Level Edit Berhasil');
    }
}
