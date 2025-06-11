<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        // Museum data (top 5 museum dengan karya seni terbanyak)
        $museumData = Art::where('status', 'approved')
                    ->selectRaw('museum_id, COUNT(*) as total')
                    ->groupBy('museum_id')
                    ->orderByDesc('total')  // urutkan dari terbanyak
                    ->with('museum')
                    ->take(5)
                    ->get()
                    ->map(function($item) {
                        return [
                            'museum' => $item->museum->name, 
                            'total' => $item->total
                        ];
                    });

        // Medium data (semua)
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
