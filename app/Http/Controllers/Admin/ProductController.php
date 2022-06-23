<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::when(\request()->filled('q'),function ($q){
            $q->where('name','like',"%".\request()->input('q')."%");
        })
        ->paginate(5);

        return view('pages.admin.products.index',[
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        return view('pages.admin.products.show',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request,Product $product)
    {
        $product->name = $request->input('edit-name');
        $product->description = $request->input('edit-description');
        $product->speaker = $request->input('edit-speaker');
        $product->place = $request->input('edit-place');
        $product->fee = $request->input('edit-fee');
        $product->capacity = $request->input('edit-capacity');
        $product->category_id = $request->input('edit-category_id');
        $product->contact = $request->input('edit-contact');
        $product->online = $request->input('edit-online');
        $product->date = Carbon::parse($request->input('edit-date'));

        if ($request->file('edit-image')){
            $this->setImageUploadPath('product/'.auth('admin')->user()->id);
            $filename = $this->uploadImage($request,'edit-image',700,800);
            if ($filename)
            {
                $product->image = $filename;
            }
        }
        $product->save();

        return redirect()->route('admin::event::show',[$product]);

    }

    public function verify(Product $product)
    {
        $product->verified = true;
        $product->save();

        return redirect(route('admin::event::show',[$product]));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin::event::index');
    }
}
