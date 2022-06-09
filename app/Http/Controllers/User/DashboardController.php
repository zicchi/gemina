<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Product::where('initiator_id',auth('user')->user()->id)->where('initiator_type',User::class);
        $joinedEvents = auth('user')->user()->orders()->count();
        $register_data = Order::whereHas('product',function ($q){
            $q->where('initiator_id',auth('user')->user()->id);
        })->count();
        return view('pages.user.dashboard',[
            'events' => $events,
            'joinedEvents' => $joinedEvents,
            'register_data' => $register_data,
        ]);
    }
}
