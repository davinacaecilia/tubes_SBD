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
        /* SELECT * FROM museums */
        return view('user.collections.index', compact('museums'));
    }

    public function collectionAZ(Request $request)
    {
        $query = Museum::query();
        $startsWith = $request->query('starts_with');

        if ($startsWith === null) {
            $activeLetter = 'A';
            $query->where('name', 'LIKE', 'A%');
        } else {
            if (!empty($startsWith)) {
                $query->where('name', 'LIKE', $startsWith . '%');
            }
            $activeLetter = $startsWith;
        }

        $museums = $query->orderBy('name')->get();
        /* SELECT * FROM museums WHERE name LIKE 'A%' ORDER BY name */

        return view('user.collections.sort', compact('museums', 'activeLetter'));
    }

    public function medium()
    {
        $mediums = Medium::withCount(['art' => function ($query) {
            $query->where('status', 'approved');
        }])->get();
        /*  SELECT mediums.*,
            (
                SELECT COUNT(*)
                FROM arts
                WHERE arts.medium_id = mediums.id
                AND arts.status = 'approved'
            ) AS art_count
            FROM mediums;
        */
        
        return view('user.mediums.index', compact('mediums'));
    }

     public function mediumAZ(Request $request)
    {
        $query = Medium::withCount(['art' => function ($q) {
            $q->where('status', 'approved');
        }]);

        $startsWith = $request->query('starts_with');

        if ($startsWith === null) {
            $activeLetter = 'A';
            $query->where('name', 'LIKE', 'A%');
        } else {
            if (!empty($startsWith)) {
                $query->where('name', 'LIKE', $startsWith . '%');
            }
            $activeLetter = $startsWith;
        }

        $mediums = $query->orderBy('name')->get();
        /* SELECT * FROM mediums WHERE name LIKE 'A%' ORDER BY name */

        return view('user.mediums.sort', compact('mediums', 'activeLetter'));
    }

    public function mediumDetail($id)
    {
        $medium = Medium::findOrFail($id);
        /* SELECT * FROM mediums WHERE id = 'id'; */
        $listMediums = Medium::withCount(['art' => function ($query) {
            $query->where('status', 'approved'); 
        }])->get();
        /*  SELECT mediums.*,
            (
                SELECT COUNT(*)
                FROM arts
                WHERE arts.medium_id = mediums.id
                AND arts.status = 'approved'
            ) AS art_count
            FROM mediums;
        */

        $isFavorited = false;
        if (auth()->check()) {
            $isFavorited = auth()->user()->favorites()
                ->where('favorable_id', $medium->id)
                ->where('favorable_type', 'App\\Models\\Medium')
                ->exists();
        }

        $arts = Art::where('medium_id', $medium->id)
            ->where('status', 'approved')
            ->get();
        /* SELECT * FROM arts WHERE medium_id = 'medium_id' AND status = 'approved'; */
        
        return view('user.mediums.detail', compact('medium', 'listMediums', 'isFavorited', 'arts'));
    }

    public function artDetail($id)
    {
        $art = Art::with('museum', 'medium')->findOrFail($id);

        // --- LOGIKA BARU UNT<y_bin_364>LOGIKA BARU UNTUK NAVIGASI ---
        // Cari karya sebelumnya (ID lebih kecil, urutkan dari besar ke kecil, ambil 1)
        $previousArt = Art::where('id', '<', $art->id)->orderBy('id', 'desc')->first();
        // Cari karya berikutnya (ID lebih besar, urutkan dari kecil ke besar, ambil 1)
        $nextArt = Art::where('id', '>', $art->id)->orderBy('id', 'asc')->first();

        // Logika favorit tetap sama
        $isFavorited = false;
        if (auth()->check()) {
            $isFavorited = auth()->user()->favorites()
                ->where('favorable_id', $art->id)
                ->where('favorable_type', 'App\\Models\\Art')
                ->exists();
        }

        // Kirim variabel baru ($previousArt, $nextArt) ke view
        return view('user.art', compact('art', 'isFavorited', 'previousArt', 'nextArt'));
    }
}
