<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $galleries = Gallery::orderBy('order')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('admin.galleries.create');
    }

    // ذخیره در دیتابیس
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt' => 'nullable|max:255',
            'description' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'تصویر با موفقیت به گالری اضافه شد');
    }

    // فرم ویرایش
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    // بروزرسانی
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt' => 'nullable|max:255',
            'description' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // اگر تصویر جدید آپلود شد
        if ($request->hasFile('image')) {
            // حذف تصویر قدیمی
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'تصویر گالری با موفقیت بروزرسانی شد');
    }

    // حذف
    public function destroy(Gallery $gallery)
    {
        // حذف تصویر
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'تصویر از گالری حذف شد');
    }
}