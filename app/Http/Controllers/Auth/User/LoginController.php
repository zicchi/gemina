<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.user.login');
    }

    public function login(Request $request)
    {

        $login = Auth::guard('user')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);


        if ($login){
            return redirect()->route('user::index');
        }else{
            return redirect()->route('main::login')->with('warning','Email atau password salah !');
        }
    }

    public function register()
    {
        return view('pages.user.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users'
        ],[
            'email.unique' => 'Email sudah digunakan !',
            'phone.unique' => 'Nomor telepon sudah digunakan !',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->image = '';
        $user->save();

        return redirect()->route('main::login')->with('success','Pendaftaran berhasil');

    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect(route('main::home'));
    }
}
