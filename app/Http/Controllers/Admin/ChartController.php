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
        /*  SELECT 
                museums.name AS museum_name, 
                COUNT(arts.id) AS total
            FROM arts
            JOIN museums ON arts.museum_id = museums.id
            WHERE arts.status = 'approved'
            GROUP BY museums.name
            ORDER BY total DESC
            LIMIT 5;
        */
        
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
        /*  SELECT 
                mediums.name AS medium_name, 
                COUNT(arts.id) AS total
            FROM arts
            JOIN mediums ON arts.medium_id = mediums.id
            WHERE arts.status = 'approved'
            GROUP BY mediums.name
            ORDER BY mediums.name;
            */

        return response()->json([
            'museum' => $museumData,
            'medium' => $mediumData
        ]);
    }


}
