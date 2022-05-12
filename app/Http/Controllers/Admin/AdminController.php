<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate();
        return view('pages.admin.admins.index',[
            'admins' => $admins,
        ]);
    }

    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->password = Hash::make($request->input('password'));
        $admin->role = $request->input('role');
        $admin->save();

        return redirect()->route('admin::admins::index');
    }

    public function update(Admin $admin,Request $request)
    {
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        if ($request->input('password') != ''){
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->role = $request->input('role');
        $admin->save();

        return redirect()->route('admin::admins::index');
    }
}
