<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function submit(Request $request)
    {
        return back()->with('status', 'Simulated login success for: ' . $request->email);
    }
}
