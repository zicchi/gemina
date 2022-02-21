<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class MainSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query;

    public $category_id = 0;

    public function render()
    {
        $products = Product::where('name', 'like', "%" . $this->query . "%")
            ->when($this->category_id > 0,function ($q){
                $q->where('category_id',$this->category_id);
            })
            ->paginate();
        $categories = Category::all();
        return view('livewire.main-search',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
