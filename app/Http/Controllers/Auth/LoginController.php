<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login awal (input email).
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Memvalidasi email, jika ada, simpan ke session dan arahkan ke halaman password.
     */
    public function checkEmail(Request $request): RedirectResponse
    {
        $request->validate(['email' => ['required', 'string', 'email']]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We could not find a user with that email address.']);
        }

        $request->session()->put('login_email', $user->email);

        return redirect()->route('login.password');
    }

    /**
     * Menampilkan halaman input password.
     */
    public function createPassword(Request $request): View|RedirectResponse
    {
        $email = $request->session()->get('login_email');

        if (!$email) {
            return redirect()->route('login');
        }

        // Cari data user untuk mendapatkan NAMA-nya
        $user = User::where('email', $email)->first();
        
        // Jika user tidak ditemukan (sangat jarang terjadi, tapi untuk keamanan)
        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'An error occurred. Please try again.']);
        }

        // Kirim 'name' dan 'email' ke view
        return view('auth.login-password', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}
