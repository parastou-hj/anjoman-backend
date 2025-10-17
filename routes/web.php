<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ContactMessageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // داشبورد
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // مدیریت اسلایدرها
    Route::resource('sliders', SliderController::class);
    
    // مدیریت نشریات
    Route::resource('journals', JournalController::class);
    
    // مدیریت گالری
    Route::resource('galleries', GalleryController::class);
    
    // مدیریت اخبار
    Route::resource('news', NewsController::class);
    
    // مدیریت پیام‌ها
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
});