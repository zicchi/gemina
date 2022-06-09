<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('pages.admin.faqs.index',[
            'faqs' => $faqs,
        ]);
    }

    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();
    }

    public function update(Faq $faq,Request $request)
    {
        $faq->question = $request->input('edit-question');
        $faq->answer = $request->input('edit-answer');
        $faq->save();
    }
}
