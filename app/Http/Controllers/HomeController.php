<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Journal;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order')
                        ->get();
        
        $journals = Journal::where('is_active', true)
                          ->latest()
                          ->take(5)
                          ->get();
        
        $galleries = Gallery::where('is_active', true)
                           ->orderBy('order')
                           ->get(['id', 'image', 'alt', 'description']);
        
        $news = News::where('is_active', true)
                   ->latest()
                   ->take(6)
                   ->get();

        
        $menus = Menu::getMainMenusWithChildren();

        return view('home', compact('sliders', 'journals', 'galleries', 'news', 'menus'));
    }
}