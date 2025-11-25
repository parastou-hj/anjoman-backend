<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterLinkController extends Controller
{
    public function index(): View
    {
        $links = FooterLink::orderBy('order')->with('page')->get();

        return view('admin.footer.links.index', compact('links'));
    }

    public function create(): View
    {
        $pages = Page::published()->orderBy('title')->get();

        return view('admin.footer.links.create', compact('pages'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        FooterLink::create($data);

        return redirect()->route('admin.footer-links.index')->with('success', 'پیوند جدید اضافه شد.');
    }

    public function edit(FooterLink $footerLink): View
    {
        $pages = Page::published()->orderBy('title')->get();

        return view('admin.footer.links.edit', [
            'footerLink' => $footerLink,
            'pages' => $pages,
        ]);
    }

    public function update(Request $request, FooterLink $footerLink): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $footerLink->update($data);

        return redirect()->route('admin.footer-links.index')->with('success', 'پیوند بروزرسانی شد.');
    }

    public function destroy(FooterLink $footerLink): RedirectResponse
    {
        $footerLink->delete();

        return redirect()->route('admin.footer-links.index')->with('success', 'پیوند حذف شد.');
    }
}