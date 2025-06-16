<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Medium;
use App\Models\Museum;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class GoogleArtsController extends Controller
{
    public function collection()
    {
        $museums = Museum::all();
        return view('user.collections.index', compact('museums'));
    }

    public function collectionAZ()
    {
        return view('user.collections.sort');
    }

    public function medium()
    {
        $mediums = Medium::withCount(['art' => function ($query) {
            $query->where('status', 'approved'); // kalau hanya mau hitung yang approved
        }])->get();
        return view('user.mediums.index', compact('mediums'));
    }

    public function mediumAZ()
    {
       return view('user.mediums.sort');
    }
    
    public function mediumDetail($id)
    {
        $medium = Medium::findOrFail($id);
        $listMediums = Medium::withCount(['art' => function ($query) {
            $query->where('status', 'approved'); 
        }])->get();

        $arts = Art::where('medium_id', $medium->id)
            ->where('status', 'approved')
            ->get();
        return view('user.mediums.detail', compact('medium', 'listMediums', 'arts'));
    }

    public function destroy()
    {
        
    }
}
