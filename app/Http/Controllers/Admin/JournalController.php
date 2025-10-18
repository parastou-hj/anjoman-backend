<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $journals = Journal::latest()->get();
        return view('admin.journals.index', compact('journals'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('admin.journals.create');
    }

    // ذخیره در دیتابیس
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

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('journals', 'public');
        }

        Journal::create($validated);

        return redirect()->route('admin.journals.index')
            ->with('success', 'نشریه با موفقیت ایجاد شد');
    }

    // فرم ویرایش
    public function edit(Journal $journal)
    {
        return view('admin.journals.edit', compact('journal'));
    }

    // بروزرسانی
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

        // اگر تصویر جدید آپلود شد
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

    // حذف
    public function destroy(Journal $journal)
    {
        // حذف تصویر
        if ($journal->image) {
            Storage::disk('public')->delete($journal->image);
        }

        $journal->delete();

        return redirect()->route('admin.journals.index')
            ->with('success', 'نشریه با موفقیت حذف شد');
    }
}