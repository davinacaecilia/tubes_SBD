<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MuseumController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtController;
use App\Http\Controllers\Admin\MediaController;

Route::get('/', function () {
    return view('koleksi');
});

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');

Route::get('/admin/dashboard', function () {
    $mediumCount = \App\Models\Medium::count();
    $artCount = \App\Models\Art::count();
    $userCount = \App\Models\User::count();
    $museumCount = \App\Models\Museum::count();
    return view('admin.dashboard', compact('mediumCount', 'artCount', 'userCount', 'museumCount'));
});

Route::prefix('admin')->group(function () {

    
    Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);



    Route::get('/art/status', [ArtController::class, 'status'])->name('admin.art.status'); 


    // Manajemen Karya Seni (URL: /admin/art)
    Route::resource('art', ArtController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names([
        'index' => 'admin.art.index', 
        'create' => 'admin.art.create',
        'store' => 'admin.art.store', 
        'edit' => 'admin.art.edit',
        'update' => 'admin.art.update',
        'destroy' => 'admin.art.destroy',
    ]);

    // Manajemen Museum (URL: /admin/museum)
    Route::resource('museum', MuseumController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names([
        'index' => 'admin.museum.index',
        'create' => 'admin.museum.create',
        'store' => 'admin.museum.store',
        'edit' => 'admin.museum.edit',
        'update' => 'admin.museum.update',
        'destroy' => 'admin.museum.destroy',
    ]);

    // Manajemen Media (URL: /admin/media)
    Route::resource('media', MediaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names([
        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit',
        'update' => 'admin.media.update',
        'destroy' => 'admin.media.destroy',
    ]);

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

});
