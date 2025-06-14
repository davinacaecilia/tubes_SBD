<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('register'); // Asumsi kamu punya file register.blade.php
    }

    // Memproses data dari form registrasi
    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Membuat user baru
        // Role otomatis menjadi 'user' sesuai default di database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Langsung login setelah registrasi berhasil
        Auth::login($user);

        // Arahkan ke dashboard user
        return redirect('/koleksi'); // atau ke halaman yang sesuai untuk user baru
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Arahkan ke halaman utama setelah logout
    }

    // Fungsi bantuan untuk mengarahkan berdasarkan role
    private function redirectBasedOnRole($user)
    {
        if ($user->role === 'supervisor') {
            return redirect()->intended('/admin/dashboard'); // Arahkan ke dashboard admin/supervisor
        }
        if ($user->role === 'admin') {
            // Berdasarkan struktur viewmu, admin sepertinya punya banyak menu
            return redirect()->intended('/admin/dashboard');
        }
        if ($user->role === 'user') {
            return redirect()->intended('/koleksi'); // Arahkan ke halaman koleksi untuk user biasa
        }

        // Fallback jika role tidak terdefinisi
        return redirect('/');
    }
}