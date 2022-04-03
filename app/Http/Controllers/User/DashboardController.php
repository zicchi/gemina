<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Product::where('initiator_id',auth('user')->user()->id)->where('initiator_type',User::class);
        $joinedEvents = auth('user')->user()->products()->count();
        return view('pages.user.dashboard',[
            'events' => $events,
            'joinedEvents' => $joinedEvents,
        ]);
    }
}
