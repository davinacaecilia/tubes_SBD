<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MuseumController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute untuk semua orang (tamu & user)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/koleksi', function () {
    return view('koleksi');
});

// Rute Halaman Profil (Bawaan Breeze, untuk semua yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk USER BIASA
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ======================================================================
// GRUP RUTE UNTUK ADMIN
// Dilindungi oleh middleware 'auth' dan 'role:admin'
// ======================================================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin (mengambil logic dari temanmu)
    Route::get('/dashboard', function () {
        $mediumCount = \App\Models\Medium::count();
        $artCount = \App\Models\Art::where('status', 'approved')->count();
        $userCount = \App\Models\User::count();
        $museumCount = \App\Models\Museum::count();
        return view('admin.dashboard', compact('mediumCount', 'artCount', 'userCount', 'museumCount'));
    })->name('dashboard');

    // Chart Data Route
    Route::get('dashboard/chart-data', [ChartController::class, 'getChartData'])->name('dashboard.chart-data');

    // Resource Controllers dari temanmu, sekarang aman di dalam grup admin
    Route::resource('user', UserController::class);
    Route::resource('art', ArtController::class);
    Route::resource('museum', MuseumController::class);
    Route::resource('media', MediaController::class);

    // Rute status art juga kita masukkan sini
    Route::get('art/status', [ArtController::class, 'status'])->name('art.status');
});

// ======================================================================
// GRUP RUTE UNTUK SUPERVISOR
// Dilindungi oleh middleware 'auth' dan 'role:supervisor'
// ======================================================================
Route::middleware(['auth', 'role:supervisor'])->prefix('supervisor')->name('supervisor.')->group(function () {
    // Dashboard Supervisor
    Route::get('/dashboard', function () {
        return view('supervisor.dashboard');
    })->name('dashboard');

    // Supervisor bisa approve dan reject art
    Route::post('art/approve/{id}', [ArtController::class, 'approve'])->name('art.approve');
    Route::post('art/reject/{id}', [ArtController::class, 'reject'])->name('art.reject');
});

// Ini untuk memuat rute otentikasi dari Breeze. JANGAN DIHAPUS.
require __DIR__.'/auth.php';