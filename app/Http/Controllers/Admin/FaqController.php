<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Footer;
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

  public function edit($id)
{
    $faq = Faq::findOrFail($id); 
    return view('faqs.edit', compact('faq'));
}


    public function update(Request $request, $id)
{
    $faq = Faq::findOrFail($id);
    $faq->question = $request->question;
    $faq->answer = $request->answer;
    $faq->save();

    return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully!');
}


   public function destroy($id)
{
    $faq = Faq::findOrFail($id);
    $faq->delete();

    return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully!');
}

    public function frontendIndex()
{
    $footer = Footer::first(); 
    $faqs = Faq::all();
    
    return view('frontend.faqs', compact('faqs','footer'));
}
    public function offer()
    {
        $footer = Footer::first(); 
        return view('frontend.offer',compact('footer'));
    }
}
