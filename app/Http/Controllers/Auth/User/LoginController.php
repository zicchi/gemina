<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect(route('main::home'));
    }
}
