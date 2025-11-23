<?php

namespace App\Http\Controllers;


use App\Models\Registration;
use App\Models\Menu;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
public function create() {
    $menus = Menu::getMainMenusWithChildren();
return view('register.form', compact('menus'));

}


public function store(Request $request) {
$validated = $request->validate([
'email' => 'required|email',
'email_confirmation' => 'required|same:email',
'username' => 'required|min:3',
'name' => 'required',
'family' => 'required',
'education' => 'required',
'rank' => 'required',
'phone' => 'required',
'mobile' => 'required',
'city' => 'required',
'address' => 'required',
'organization' => 'required',
]);


Registration::create($validated);


return back()->with('success', 'ثبت‌نام با موفقیت انجام شد');
}
}
