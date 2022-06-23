<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('pages.admin.categories.index',[
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin::category::index');
    }

    public function update(Category $category,Request $request)
    {
        $category->name = $request->input('edit-name');
        $category->save();

        return redirect()->route('admin::category::index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin::category::index');
    }
}
