<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::orderBy('created_at','desc')->paginate(15);

        return view('pages.admin.suggestion.index',[
            'suggestions' => $suggestions
        ]);
    }
}
