<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $user = auth('user')->user();
        $check = Order::where('product_id',$product->id)->where('user_id',$user->id)->first();
        return view('pages.main.product.view',[
            'product' => $product,
            'check' => $check,
        ]);
    }

    public function join(Product $product)
    {
        $user = auth('user')->user();
        $check = Order::where('product_id',$product->id)->where('user_id',$user->id)->first();
        if ($check){
            return redirect(route('main::product::show',[$product]))->with('danger','Anda sudah terdaftar');
        }else{
            $order = new Order();
            $order->user_id = $user->id;
            $order->product_id = $product->id;
            $order->save();

            return redirect(route('main::product::show',[$product]))->with('success','Anda berhasil mendaftar pada seminar ini');
        }
    }
}
