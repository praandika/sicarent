<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = User::where('access','<>','user')->get();
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
                $data->access = $req->access;
                $data->password = bcrypt($pass);
                $data->save();
                toast('Data berhasil disimpan','success')->autoClose(1500);
                return redirect()->back();
    
            }else{
                alert()->warning('Warning','Password tidak cocok!');
                return redirect()->back()->withInput();
            }
        }
    }

    public function update(Request $req){
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->username = $req->username;
        $data->username = $req->gender;
        $data->phone = $req->phone;
        $data->access = $req->access;
        $data->save();
        toast('Data berhasil disimpan','success')->autoClose(1500);
        return redirect()->route('user.read');
    }

    public function adminpass(Request $req){
        $old = $req->oldpass;
        $new = $req->adminpass;
        $id = Auth::user()->id;

        $data = User::find($id);

        if (Hash::check($old, $data->password)) {
            $data->password = bcrypt($new);
            $data->save();
            toast('Password changed','success');
            Auth::logout();
            return redirect()->route('login');
        } else {
            alert()->warning('Warning','Password salah!');
            return redirect()->back()->withInput();
        }
        
    }

    public function updatePass(Request $req){
        $data = User::where('email',$req->email)->get();
        dd($data);
    }
}
