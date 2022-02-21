<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.main.product');
    }

    public function show(Product $product)
    {
        return view('pages.main.product.view',[
            'product' => $product,
        ]);
    }
}
