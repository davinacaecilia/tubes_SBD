<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\User\GoogleArtsController;
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
// Rute Halaman Profil (Bawaan Breeze, untuk semua yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk USER BIASA
Route::get('/', [GoogleArtsController::class, 'collection'])->name('user.collections.all');
Route::get('/collections/A-Z', [GoogleArtsController::class, 'collectionAZ'])->name('user.collections.AZ');
Route::get('/medium', [GoogleArtsController::class, 'medium'])->name('user.mediums.all');
Route::get('/medium/A-Z', [GoogleArtsController::class, 'mediumAZ'])->name('user.mediums.AZ');
Route::get('/medium/details/{id}', [GoogleArtsController::class, 'mediumDetail'])->name('user.mediums.detail');
Route::get('/art/details/{id?}', [GoogleArtsController::class, 'artDetail'])->name('user.art.detail');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.custom');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');



Route::middleware(['auth', 'role:admin,supervisor'])->prefix('admin')->name('admin.')->group(function () {
    // Rute Dashboard (tetap sama)
    Route::get('/dashboard', function () {
        $mediumCount = Medium::count();
        /* SELECT COUNT(*) FROM `mediums` */
        $artCount = Art::where('status', 'approved')->count();
        /* SELECT COUNT(*) FROM `art` WHERE `status` = 'approved' */
        $userCount = User::count();
        /* SELECT COUNT(*) FROM `users` */
        $museumCount = Museum::count();
        /* SELECT COUNT(*) FROM `museums` */
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