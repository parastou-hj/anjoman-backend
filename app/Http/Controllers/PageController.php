<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::published()->where('slug', $slug)->first();

        if (! $page) {
            throw new NotFoundHttpException();
        }

        $menus = Menu::getMainMenusWithChildren();

        return view('pages.show', compact('page', 'menus'));
    }
}