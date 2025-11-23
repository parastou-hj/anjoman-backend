<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class RegistrationAdminController extends Controller
{

    public function index()
    {
        $items = Registration::latest()->paginate(20);
        return view('admin.registrations.index', compact('items'));
    }

    
    public function show($id)
    {
        $item = Registration::findOrFail($id);
        return view('admin.registrations.show', compact('item'));
    }
}
