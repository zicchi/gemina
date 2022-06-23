<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $admin = auth('admin')->user();
        $users = User::count();
        $products = Product::count();

        for($i=0; $i < 7; $i++)
        {
            $userStats = User::whereDate('created_at', Carbon::now()->subDays($i))
                ->count();
            $productStats = Product::whereDate('created_at', Carbon::now()->subDays($i))
                ->count();

            $days = \Carbon\Carbon::now()->subDays($i)->startOfDay()->day." ".Carbon::now()->subDays($i)->startOfDay()->monthName;
            $reports[] = [
                'days' => $days,
                'userStats' => $userStats,
                'productStats' => $productStats
            ];
        }

        return view('pages.admin.dashboard',[
            'admin' => $admin,
            'users' => $users,
            'products' => $products,
            'reports' => $reports
        ]);
    }
}
