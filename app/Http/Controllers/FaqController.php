<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $data = $request->except('_token');
        $res = Faq::create($data);
        if ($res) {
            return redirect()->route('admin.faqs.index')->with('success', 'Saved Successfully!');
        } else {
            return redirect()->route('admin.faqs.index')->with('alert', 'Problem With Creating New Faq');
        }
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $data = $request->except('_token', '_method');
        $mac = Faq::find($id);
        $res = $mac->update($data);
        if ($res) {
            return redirect()->route('admin.faqs.index')->with('success', ' Updated Successfully!');
        } else {
            return redirect()->route('admin.faqs.index')->with('alert', 'Problem With Updating Faq');
        }
    }

    public function destroy($id)
    {
        $data = Faq::find($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Faq was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Faq');
        }
    }
}
