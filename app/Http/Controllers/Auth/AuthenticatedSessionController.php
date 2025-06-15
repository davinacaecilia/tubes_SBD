<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {


        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin' || $user->role === 'supervisor') {
            return redirect()->intended('/admin/dashboard');
        }

        // Untuk semua role lain (termasuk 'user')
        return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Baris ini menghancurkan sesi untuk guard 'web'
        Auth::guard('web')->logout();

        // Baris ini membuat sesi yang lama tidak valid
        $request->session()->invalidate();

        // Baris ini membuat token CSRF yang baru untuk keamanan
        $request->session()->regenerateToken();


        return redirect('/'); // Arahkan ke halaman koleksi setelah logout
    }
}
