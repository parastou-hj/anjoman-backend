<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterSettingController extends Controller
{
    public function edit(): View
    {
        $footer = FooterSetting::first();

        return view('admin.footer.settings', compact('footer'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
        ]);

        $footer = FooterSetting::first();

        if ($footer) {
            $footer->update($data);
        } else {
            FooterSetting::create($data);
        }

        return redirect()->route('admin.footer.edit')->with('success', 'اطلاعات فوتر با موفقیت ذخیره شد.');
    }
}