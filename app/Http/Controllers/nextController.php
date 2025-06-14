<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nextController extends Controller
{
    public function showHome(Request $request)
    {
        $user = $request->user();
        return view('next', compact('next'));
    }
}
