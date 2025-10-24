<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderByDesc('created_at')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'content' => ['required', 'string'],
            'is_published' => ['boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        $validated['slug'] = $this->resolveSlug($validated['title'], $validated['slug'] ?? null);

        Page::create($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'صفحه با موفقیت ایجاد شد.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug,' . $page->id],
            'content' => ['required', 'string'],
            'is_published' => ['boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        $validated['slug'] = $this->resolveSlug($validated['title'], $validated['slug'] ?? null, $page->id);

        $page->update($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'صفحه با موفقیت بروزرسانی شد.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'صفحه حذف شد.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:5120'],
        ]);

        $path = $request->file('file')->store('pages', 'public');

        return response()->json([
            'location' => asset('storage/' . $path),
        ]);
    }

    protected function resolveSlug(string $title, ?string $providedSlug = null, ?int $ignoreId = null): string
    {
        $locale = config('app.locale', 'fa');

        $baseSlug = $providedSlug
            ? Str::slug($providedSlug, '-', $locale)
            : Str::slug($title, '-', $locale);

        if (empty($baseSlug)) {
            $baseSlug = Str::lower(Str::random(8));
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Page::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}