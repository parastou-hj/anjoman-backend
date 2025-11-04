<?php
 
 namespace App\Http\Controllers\Admin;
 
 use App\Http\Controllers\Controller;
use App\Models\News;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
 class NewsController extends Controller
 {

     public function index()
     {

        $newsItems = News::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.news.index', compact('newsItems'));
     }
 

     public function create()
     {

        return view('admin.news.create');
     }
 

     public function store(Request $request)
     {


        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_active' => ['sometimes', 'boolean'],
        ]);
 


        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        News::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'خبر با موفقیت ایجاد شد');
     }
 


    public function edit(News $news)
     {

        return view('admin.news.edit', compact('news'));
     }
 


    public function update(Request $request, News $news)
     {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
           ->with('success', 'خبر با موفقیت بروزرسانی شد');
     }
 

    public function destroy(News $news)
     {

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
           ->with('success', 'خبر با موفقیت حذف شد');
     }
 }
