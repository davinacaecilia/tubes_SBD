<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        
       if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $email = $request->email;
    $name = strstr($email, '@', true);
    $request->session()->put('email', $email);
    $request->session()->put('name', $name);

    return redirect()->route('next');
}

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function next()
    {
        return view('next');
    }


}
