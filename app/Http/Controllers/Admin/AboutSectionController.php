<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function edit()
    {
        $about = AboutSection::first();

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'lead' => ['required', 'string'],
            'highlight_one' => ['nullable', 'string', 'max:255'],
            'highlight_two' => ['nullable', 'string', 'max:255'],
            'highlight_three' => ['nullable', 'string', 'max:255'],
            'mission_title' => ['nullable', 'string', 'max:255'],
            'mission_description' => ['nullable', 'string'],
        ]);

        $about = AboutSection::first();

        if ($about) {
            $about->update($data);
        } else {
            AboutSection::create($data);
        }

        return redirect()->route('admin.about.edit')->with('success', 'بخش درباره انجمن با موفقیت به‌روزرسانی شد.');
    }
}
