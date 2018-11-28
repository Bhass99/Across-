<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\faq;
class FAQsController extends Controller
{

    public function index()
    {
        $faq = faq::all();
        return view('faq.index' , compact('faq'));
    }


    public function create()
    {
        return view('faq.create');
    }


    public function store()
    {
        $faq = new faq();
        $faq-> question = request('question');
        $faq-> answer = request('answer');
        $faq-> image = request('image')->store('uploads');
        $faq-> posted_by = Auth::user()->email;
        $faq->save();

        return redirect('/faq' );
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $faq= faq::find($id);
        return view('faq.edit' , compact('faq'));
    }


    public function update(faq $faq)
    {
        $faq-> question = request('question');
        $faq-> answer = request('answer');
        $faq-> image = request('image')->store('uploads');
        $faq-> posted_by = Auth::user()->email;
        $faq->save();

        return redirect('/faq' );
    }


    public function destroy(faq $faq )
    {
        $faq->delete();
       return redirect('/faq');
    }
}
