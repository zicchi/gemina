<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        return view('pages.main.suggestion.index');
    }

    public function store(Request $request)
    {
        $suggestion = new Suggestion();
        $suggestion->name = $request->input('full_name').' '.$request->input('last_name');
        $suggestion->email = $request->input('email');
        $suggestion->phone = $request->input('phone');
        $suggestion->comments = $request->input('comments');
        $suggestion->save();

        return redirect(route('main::suggestion::index'));
    }
}
