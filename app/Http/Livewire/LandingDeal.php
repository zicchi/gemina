<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class LandingDeal extends Component
{
    public $time = 'Today';

    public function getTime($time)
    {
        $diff = $time->diffInHours(now());
        $this->time = $diff.' Hari';
    }

    public function render()
    {
        $products = Product::where('activated',true)->orderBy('date')->limit(2)->get();
        return view('livewire.landing-deal',[
            'products' => $products,
        ]);
    }
}
