<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\nextController; 
use App\Http\Controllers\CreateController;
Route::get('/', function () {
    return view('koleksi');
});
Route::get('/next', function () { 
    return view('next');
})->name('next');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');
Route::get('/next', [LoginController::class, 'next'])->name('login.next');
Route::get('/create', [CreateController::class, 'show'])->name('create');
Route::post('/create', [CreateController::class, 'submit'])->name('create.submit');
Route::post('/password', [LoginController::class, 'passwordSubmit'])->name('password.submit');
