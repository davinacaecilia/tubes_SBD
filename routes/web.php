<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Rute untuk semua orang (tamu & user)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/koleksi', function () {
    // Nanti kamu bisa sesuaikan ini untuk menampilkan halaman koleksi
    return view('koleksi');
});

// Rute Halaman Profil (Bawaan Breeze, untuk semua yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk USER BIASA
// URL: /dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // Mengarah ke /resources/views/user/dashboard.blade.php
})->middleware(['auth', 'verified'])->name('dashboard');


// Grup Rute khusus ADMIN
// Semua rute di sini hanya bisa diakses oleh role 'admin'
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // URL: /admin/dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Mengarah ke /resources/views/admin/dashboard.blade.php
    })->name('dashboard');

    // Nanti semua rute admin lainnya (seperti /admin/art, /admin/museum) letakkan di sini.

});


// Grup Rute khusus SUPERVISOR
// Semua rute di sini hanya bisa diakses oleh role 'supervisor'
Route::middleware(['auth', 'role:supervisor'])->prefix('supervisor')->name('supervisor.')->group(function () {

    // URL: /supervisor/dashboard
    Route::get('/dashboard', function () {
        // Pastikan kamu sudah punya file /resources/views/supervisor/dashboard.blade.php
        return view('supervisor.dashboard');
    })->name('dashboard');

    // Nanti semua rute supervisor lainnya letakkan di sini.

});


// Ini untuk memuat rute otentikasi (login, register, logout, dll). JANGAN DIHAPUS.
require __DIR__.'/auth.php';