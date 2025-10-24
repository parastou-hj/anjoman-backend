<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\BoardMemberController;
use App\Http\Controllers\BoardMembersController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('pages.show');

// صفحه عمومی اعضای هیئت مدیره
Route::get('/board-members', [BoardMembersController::class, 'index'])->name('board-members');

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
    
    // مدیریت منوها
    Route::resource('menus', MenuController::class);
    Route::post('menus/{menu}/toggle', [MenuController::class, 'toggleStatus'])->name('menus.toggle');
    
    // مدیریت اعضای هیئت مدیره
    Route::resource('board-members', BoardMemberController::class);
    
    // مدیریت اسلایدرها
    Route::resource('sliders', SliderController::class);

      // مدیریت بخش خوشامدگویی
    Route::get('welcome', [WelcomeController::class, 'edit'])->name('welcome.edit');
    Route::put('welcome', [WelcomeController::class, 'update'])->name('welcome.update');

     // مدیریت صفحات داخلی
    Route::post('pages/upload-image', [AdminPageController::class, 'uploadImage'])->name('pages.upload-image');
    Route::resource('pages', AdminPageController::class)->except(['show']);
    
    // مدیریت نشریات
    Route::resource('journals', JournalController::class);
    
    // مدیریت گالری
    Route::resource('galleries', GalleryController::class);
    
    // مدیریت اخبار
    Route::resource('news', NewsController::class);
    
    // مدیریت پیام‌ها
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
});