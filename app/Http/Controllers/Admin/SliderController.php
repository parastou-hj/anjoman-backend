<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('admin.sliders.create');
    }

    // ذخیره در دیتابیس
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'اسلایدر با موفقیت ایجاد شد');
    }

    // فرم ویرایش
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    // بروزرسانی
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // اگر تصویر جدید آپلود شد
        if ($request->hasFile('image')) {
            // حذف تصویر قدیمی
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $validated['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'اسلایدر با موفقیت بروزرسانی شد');
    }

    // حذف
    public function destroy(Slider $slider)
    {
        // حذف تصویر
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'اسلایدر با موفقیت حذف شد');
    }
}