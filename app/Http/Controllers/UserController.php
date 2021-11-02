<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = User::all();
        $title = "User";
        return view('admin.user', compact('data','title'));
    }

    public function store(Request $req)
    {
        $validateData = $req->validate([
            'name' => 'required',
            'email' => 'required|unique|email',
            'username' => 'required|unique',
            'gender' => 'required',
            'phone' => 'required|min:10',
            'address' => 'required',
            'birthday' => 'required',
            'access' => 'required',
        ]);

        User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email')
        ]);
    }

    public function deleteAll(Request $req){
        $delId = $req->input('pilih');
        User::whereIn('id', $delId)->delete();

        return redirect()->back();
    }
}
