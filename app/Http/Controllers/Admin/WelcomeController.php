<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the form for editing the welcome section.
     */
    public function edit()
    {
        $welcome = Welcome::first();

        return view('admin.welcome.edit', compact('welcome'));
    }

    /**
     * Update the welcome section in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $welcome = Welcome::first();

        if ($welcome) {
            $welcome->update($data);
        } else {
            Welcome::create($data);
        }

        return redirect()->route('admin.welcome.edit')->with('success', 'بخش خوشامدگویی با موفقیت به‌روزرسانی شد.');
    }
}