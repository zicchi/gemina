<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class MainSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query;

    public function render()
    {
        $products = Product::where('name', 'like', "%" . $this->query . "%")
            ->paginate();
        return view('livewire.main-search',[
            'products' => $products
        ]);
    }
}
