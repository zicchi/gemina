<?php

namespace App\Http\Controllers\User;

use App\Helpers\Traits\ImageUploader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageUploader;
    public function index()
    {
        return view('pages.user.profile.index',[
            'user' => auth('user')->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth('user')->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('new') && $request->filled('new') && $request->filled('confirmPassword') ){
            if (Hash::check($request->input('old'),$user->password)){
                if ($request->input('new') == $request->input('confirmPassword')){
                    $user->password = Hash::make($request->input('new'));
                }else{
                    return redirect(route('user::profile::index'))->with('danger','Gagal Ubah Profil, konfirmasi password tidak sesuai !');
                }
            }else{
                return redirect(route('user::profile::index'))->with('danger','Gagal Ubah Profil, password lama tidak sesuai !');
            }
        }
        $user->image = '';
        $filename = $this->uploadImage($request);
        if ($filename)
        {
            $user->image = $filename;
        }


        $user->save();

        return redirect(route('user::profile::index'))->with('success','Ubah profil sukses !');
    }
}
