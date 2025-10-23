<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
  
    public function index()
    {
        $journals = Journal::latest()->get();
        return view('admin.journals.index', compact('journals'));
    }

  
    public function create()
    {
        return view('admin.journals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag' => 'required|max:100',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

       
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('journals', 'public');
        }

        Journal::create($validated);

        return redirect()->route('admin.journals.index')
            ->with('success', 'نشریه با موفقیت ایجاد شد');
    }

    public function edit(Journal $journal)
    {
        return view('admin.journals.edit', compact('journal'));
    }

   
    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag' => 'required|max:100',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

      
        if ($request->hasFile('image')) {
            // حذف تصویر قدیمی
            if ($journal->image) {
                Storage::disk('public')->delete($journal->image);
            }
            $validated['image'] = $request->file('image')->store('journals', 'public');
        }

        $journal->update($validated);

        return redirect()->route('admin.journals.index')
            ->with('success', 'نشریه با موفقیت بروزرسانی شد');
    }

    
    public function destroy(Journal $journal)
    {
      
        if ($journal->image) {
            Storage::disk('public')->delete($journal->image);
        }

        $journal->delete();

        return redirect()->route('admin.journals.index')
            ->with('success', 'نشریه با موفقیت حذف شد');
    }
}