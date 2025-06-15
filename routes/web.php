<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MuseumController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ChartController;
use App\Models\Medium;
use App\Models\Art;
use App\Models\User;
use App\Models\Museum;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk semua orang (tamu & user)
Route::get('/', function () {
    return view('koleksi');
});

Route::get('/my-profile', function () {
        // Mengarah ke file: resources/views/media/profil.blade.php
        return view('media.profil');
    })->name('profile.custom'); // Kita beri nama 'profile.custom'

// Rute Halaman Profil (Bawaan Breeze, untuk semua yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk USER BIASA
Route::get('/media_home', function () {
    return view('media.media_home'); 
})->name('media.home');

Route::get('/az', function () {
    return view('media.az');
})->name('collections.az');

Route::get('/karya', function () {
    return view('media.karya');
})->name('collections.karya');

Route::get('/isi_media', function () {
    return view('media.isi_media');
})->name('collections.isi_media');

Route::get('/mediaa', function () {
    return view('media.mediaa');
})->name('collections.mediaa');

Route::middleware(['auth', 'role:admin,supervisor'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute Dashboard (tetap sama)
    Route::get('/dashboard', function () {
        $mediumCount = Medium::count();
        $artCount = Art::where('status', 'approved')->count();
        $userCount = User::count();
        $museumCount = Museum::count();
        return view('admin.dashboard', compact('mediumCount', 'artCount', 'userCount', 'museumCount'));
    })->name('dashboard');

    // Rute CRUD (tetap sama)
    Route::get('dashboard/chart-data', [ChartController::class, 'getChartData'])->name('dashboard.chart-data');
    Route::resource('user', UserController::class);
    Route::get('art/status', [ArtController::class, 'status'])->name('art.status');
    Route::resource('art', ArtController::class);
    Route::resource('museum', MuseumController::class);
    Route::resource('media', MediaController::class);

    // RUTE DARI SUPERVISOR SEKARANG PINDAH KE SINI
    Route::post('art/approve/{id}', [ArtController::class, 'approve'])->name('art.approve');
    Route::post('art/reject/{id}', [ArtController::class, 'reject'])->name('art.reject');
});

// Ini untuk memuat rute otentikasi dari Breeze. JANGAN DIHAPUS.
require __DIR__.'/auth.php';