<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Traits\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpeakerController extends Controller
{
    use ImageUploader;
    public function index()
    {
        $speakers = Speaker::paginate();
        $categories = Category::all();

        return view('pages.admin.speaker.index',[
            'speakers' => $speakers,
            'categories' => $categories,
        ]);
    }

    public function registerForm()
    {
        $categories = Category::all();
        return view('pages.speaker.register',[
            'categories' => $categories
        ]);
    }

    public function update(Speaker $speaker,Request $request)
    {
//        $this->validate($request,[
//            'cv_url' => 'required|mimes:pdf',
//            'image' => 'required|mimes:jpg,png,jpeg'
//        ]);

        $speaker->name = $request->input('name');
        $speaker->email = $request->input('email');
        $speaker->category_id = $request->input('category_id');
        $speaker->bio = $request->input('bio');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->github = $request->input('github');

        if ($request->file('image')){
            $this->setImageUploadPath('speaker/'.$speaker->id);
            $filename = $this->uploadImage($request);
            if ($filename)
            {
                $speaker->image = $filename;
            }
        }else{
            $speaker->image = '';
        }
        $speaker->dribbble = $request->input('dribbble');
        $speaker->instance = $request->input('instance');
        $speaker->save();

        return redirect()->route('admin::speakers::index')->with('success','Silahkan tunggu CV Anda diverifikasi, setelah diverifikasi data Anda akan muncul pada halaman utama');
    }

    public function register(Request $request)
    {

        $this->validate($request,[
            'cv_url' => 'required|mimes:pdf',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $speaker = new Speaker();
        $speaker->name = $request->input('name');
        $speaker->email = $request->input('email');
        $speaker->category_id = $request->input('category_id');
        $speaker->bio = $request->input('bio');
        $speaker->linkedin = $request->input('linkedin');
        $speaker->github = $request->input('github');
        $cv_url = $request->file('cv_url')->store('cv/'.$speaker->id.'');
        $speaker->cv_url = $cv_url;

        if ($request->file('image')){
            $this->setImageUploadPath('speaker/'.$speaker->id);
            $filename = $this->uploadImage($request);
            if ($filename)
            {
                $speaker->image = $filename;
            }
        }else{
            $speaker->image = '';
        }
        $speaker->dribbble = $request->input('dribbble');
        $speaker->instance = $request->input('instance');
        $speaker->save();

        return redirect()->route('main::speaker::register-form')->with('success','Silahkan tunggu CV Anda diverifikasi, setelah diverifikasi data Anda akan muncul pada halaman utama');
    }

    public function activate(Speaker $speaker)
    {
        $speaker->activated = true;
        $speaker->save();

        return redirect()->route('admin::speakers::index');
    }

}
