<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Art;
use App\Models\Medium;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'favorable_id' => 'required|integer',
            'favorable_type' => 'required|string|in:Art,Medium', // Pastikan tipenya valid
        ]);

        $user = Auth::user();
        $favorableId = $request->favorable_id;
        $favorableType = 'App\\Models\\' . $request->favorable_type; // Nama model lengkap

        $favorite = Favorite::where('user_id', $user->id)
                            ->where('favorable_id', $favorableId)
                            ->where('favorable_type', $favorableType)
                            ->first();

        if ($favorite) {
            $favorite->delete();
            $status = 'removed';
            $message = 'Removed from favorites.';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'favorable_id' => $favorableId,
                'favorable_type' => $favorableType,
            ]);
            $status = 'added';
            $message = 'Added to favorites.';
        }

        return response()->json(['status' => $status, 'message' => $message]);
    }
}