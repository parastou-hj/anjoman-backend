<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::where('is_active', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(9);

        $menus = Menu::getMainMenusWithChildren();

        return view('news.index', compact('newsItems', 'menus'));
    }

    public function show(News $news)
    {
        if (!$news->is_active) {
            abort(404);
        }

        $menus = Menu::getMainMenusWithChildren();

        return view('news.show', compact('news', 'menus'));
    }
}