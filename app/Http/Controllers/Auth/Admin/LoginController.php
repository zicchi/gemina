<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.admin.login');
    }

    public function login(Request $request)
    {

        $login = Auth::guard('admin')->attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);


        if ($login){
            return redirect()->route('admin::index');
        }else{
            return redirect()->route('main::admin::auth::index')->with('warning','Email atau password salah !');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(route('main::admin::auth::index'));
    }
}
