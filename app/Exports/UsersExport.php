<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function view(): View
    {
        $users  = User::whereHas('orders',function ($q){
            $q->where('product_id',$this->product->id);
        })->get();

        return view('excel.users',[
            'users' => $users,
        ]);
    }
}
