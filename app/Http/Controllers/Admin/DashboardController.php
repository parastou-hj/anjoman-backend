<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Journal;
use App\Models\Gallery;
use App\Models\News;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'sliders' => Slider::count(),
            'journals' => Journal::count(),
            'galleries' => Gallery::count(),
            'news' => News::count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}