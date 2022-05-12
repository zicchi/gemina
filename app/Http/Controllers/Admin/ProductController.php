<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

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

    public function verify(Product $product)
    {
        $product->verified = true;
        $product->save();

        return redirect(route('admin::event::show',[$product]));
    }
}
