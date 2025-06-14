<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = User::query();

        // FITUR SEARCH BY NAME
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // FITUR SORT BY NAME ASC (A-Z), DESC (Z-A), ATAU DEFAULT -> ASC (ID)
        if ($request->sort === 'az') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort === 'za') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('id');
        }

        $users = $query->paginate(10);
        /* SELECT * FROM users LIMIT 10 OFFSET 0; */
        /* SELECT * FROM users WHERE name LIKE '%search%' LIMIT 10 OFFSET 0; */
        /* SELECT * FROM users ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM users ORDER BY name DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM users ORDER BY id ASC LIMIT 10 OFFSET 0; */

        // ATAU FITUR SEARCH + SORT
        /* SELECT * FROM users WHERE name LIKE '%search%' ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM users WHERE name LIKE '%search%' ORDER BY name DESC LIMIT 10 OFFSET 0; */
        
        return view('admin.user.index', compact('users', 'user'));
    }
}
