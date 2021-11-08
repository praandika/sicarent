<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

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
        $pass = $req->password;
        $confirm = $req->confirm;
        $email = $req->email;
        $username = $req->username;
        $isEmail = User::where('email',$email)->first();
        $isUsername = User::where('username',$username)->first();

        if (($isEmail == $email) || ($isUsername == $username)) {
            alert()->warning('Warning','Email atau Username sudah ada!');
            return redirect()->back()->withInput();
        } else {
            if ($confirm === $pass) {
                $data = new User;
                $data->name = $req->name;
                $data->email = $req->email;
                $data->username = $req->username;
                $data->gender = $req->gender;
                $data->phone = $req->phone;
                $data->address = $req->address;
                $data->access = $req->access;
                $data->birthday = $req->birthday;
                $data->password = bcrypt($pass);
                $data->save();
                toast('Data berhasil disimpan','success')->autoClose(5000);
                return redirect()->back();
    
            }else{
                alert()->warning('Warning','Password tidak cocok!');
                return redirect()->back()->withInput();
            }
        }
    }
}
