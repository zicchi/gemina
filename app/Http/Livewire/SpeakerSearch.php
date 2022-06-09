<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Speaker;
use Livewire\Component;
use Livewire\WithPagination;

class SpeakerSearch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $query;

    public $category_id = 0;
    public function render()
    {
        $speakers = Speaker::where('name', 'like', "%" . $this->query . "%")
            ->when($this->category_id > 0,function ($q){
                $q->where('category_id',$this->category_id);
            })
            ->where('activated',true)
            ->paginate();
        $categories = Category::all();
        return view('livewire.speaker-search',[
            'speakers' => $speakers,
            'categories' => $categories,
        ]);
    }
}
