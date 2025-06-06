<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // DashboardController.php
use App\Models\Order;

public function index()
{
    return view('dashboard');
}

}
