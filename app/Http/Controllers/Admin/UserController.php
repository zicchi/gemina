<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ImageUploader;
    public function index()
    {
        $users = User::paginate(5);
        return view('pages.admin.user.index',[
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        if ($request->file('image')){
            $this->setImageUploadPath('user/'.$user->id);
            $filename = $this->uploadImage($request);
            if ($filename)
            {
                $user->image = $filename;
            }
        }else{
            $user->image = '';
        }
        $user->save();

        return redirect()->route('admin::user::index');
    }

    public function update(User $user,Request $request)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if ($request->filled('password')){
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->file('image')){
            $this->setImageUploadPath('user/'.$user->id);
            $filename = $this->uploadImage($request);
            if ($filename)
            {
                $user->image = $filename;
            }
        }
        $user->save();

        return redirect()->route('admin::user::show',[$user]);
    }

    public function show(User $user)
    {
        return view('pages.admin.user.show',[
            'user' => $user
        ]);
    }
}
