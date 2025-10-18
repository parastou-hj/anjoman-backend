<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoardMemberController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $members = BoardMember::orderBy('order')->get();
        return view('admin.board-members.index', compact('members'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('admin.board-members.create');
    }

    // ذخیره در دیتابیس
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'job_title' => 'nullable|max:500',
            'specialization' => 'nullable|max:500',
            'website_url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('board-members', 'public');
        }

        BoardMember::create($validated);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'عضو هیئت مدیره با موفقیت اضافه شد');
    }

    // فرم ویرایش
    public function edit(BoardMember $boardMember)
    {
        return view('admin.board-members.edit', compact('boardMember'));
    }

    // بروزرسانی
    public function update(Request $request, BoardMember $boardMember)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'job_title' => 'nullable|max:500',
            'specialization' => 'nullable|max:500',
            'website_url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // اگر تصویر جدید آپلود شد
        if ($request->hasFile('image')) {
            // حذف تصویر قدیمی
            if ($boardMember->image) {
                Storage::disk('public')->delete($boardMember->image);
            }
            $validated['image'] = $request->file('image')->store('board-members', 'public');
        }

        $boardMember->update($validated);

        return redirect()->route('admin.board-members.index')
            ->with('success', 'اطلاعات عضو هیئت مدیره بروزرسانی شد');
    }

    // حذف
    public function destroy(BoardMember $boardMember)
    {
        // حذف تصویر
        if ($boardMember->image) {
            Storage::disk('public')->delete($boardMember->image);
        }

        $boardMember->delete();

        return redirect()->route('admin.board-members.index')
            ->with('success', 'عضو از هیئت مدیره حذف شد');
    }
}