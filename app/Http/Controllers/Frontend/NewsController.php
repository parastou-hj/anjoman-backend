<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
}