<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        // MENAMPILKAN DATA 5 MUSEUM DENGAN JUMLAH ART TERBANYAK
        $museumData = Art::where('status', 'approved')
                    ->selectRaw('museum_id, COUNT(*) as total')
                    ->groupBy('museum_id')
                    ->orderByDesc('total')  
                    ->with('museum')
                    ->take(5)
                    ->get()
                    ->map(function($item) {
                        return [
                            'museum' => $item->museum->name, 
                            'total' => $item->total
                        ];
                    });
        
        // MENAMPILKAN DATA JUMLAH ART TIAP MEDIUM
        $mediumData = Art::where('status', 'approved')
                    ->selectRaw('medium_id, COUNT(*) as total')
                    ->groupBy('medium_id')
                    ->with('medium')
                    ->get()
                    ->map(function($item) {
                        return [
                            'medium' => $item->medium->name,
                            'total' => $item->total
                        ];
                    });

        return response()->json([
            'museum' => $museumData,
            'medium' => $mediumData
        ]);
    }


}
