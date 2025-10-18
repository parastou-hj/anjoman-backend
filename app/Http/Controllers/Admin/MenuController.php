<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // نمایش لیست
    public function index()
    {
        $menus = Menu::with('parent')
                    ->orderBy('parent_id')
                    ->orderBy('order')
                    ->get();
        
        return view('admin.menus.index', compact('menus'));
    }

    // فرم ایجاد
    public function create()
    {
        $parentMenus = Menu::whereNull('parent_id')
                          ->active()
                          ->ordered()
                          ->get();
        
        return view('admin.menus.create', compact('parentMenus'));
    }

    // ذخیره در دیتابیس
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'nullable|max:500',
            'target' => 'required|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        Menu::create($validated);

        return redirect()->route('admin.menus.index')
            ->with('success', 'منو با موفقیت ایجاد شد');
    }

    // فرم ویرایش
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::whereNull('parent_id')
                          ->where('id', '!=', $menu->id)
                          ->active()
                          ->ordered()
                          ->get();
        
        return view('admin.menus.edit', compact('menu', 'parentMenus'));
    }

    // بروزرسانی
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'nullable|max:500',
            'target' => 'required|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        // جلوگیری از اینکه منو والد خودش باشد
        if ($validated['parent_id'] == $menu->id) {
            return back()->withErrors(['parent_id' => 'منو نمی‌تواند والد خودش باشد']);
        }

        $menu->update($validated);

        return redirect()->route('admin.menus.index')
            ->with('success', 'منو با موفقیت بروزرسانی شد');
    }

    // حذف
    public function destroy(Menu $menu)
    {
        // بررسی اینکه آیا فرزند دارد یا نه
        if ($menu->children()->count() > 0) {
            return back()->withErrors(['delete' => 'ابتدا منوهای فرعی را حذف کنید']);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
            ->with('success', 'منو با موفقیت حذف شد');
    }

    // تغییر سریع وضعیت
    public function toggleStatus(Menu $menu)
    {
        $menu->update(['is_active' => !$menu->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $menu->is_active,
            'message' => 'وضعیت منو تغییر کرد'
        ]);
    }
}