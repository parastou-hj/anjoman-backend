<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;
use App\Models\Menu;
use Illuminate\Http\Request;

class BoardMembersController extends Controller
{
    public function index()
    {
        $boardMembers = BoardMember::getActiveMembers();
        
        $menus = Menu::getMainMenusWithChildren();

        return view('board-members', compact('boardMembers', 'menus'));
    }
}