<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Product::where('user_id',auth('user')->user()->id);
        return view('pages.user.dashboard',[
            'events' => $events,
        ]);
    }
}
