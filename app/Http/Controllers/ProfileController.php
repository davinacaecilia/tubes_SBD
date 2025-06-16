<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Favorite;
use App\Models\Art;
use App\Models\Medium;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function showProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Ambil semua data favorit beserta relasi polimorfiknya
        $favoritedArtIds = $user->favorites()
            ->where('favorable_type', 'App\\Models\\Art')
            ->pluck('favorable_id');
        // Ambil objek Art berdasarkan ID tersebut
        $favoritedItems = Art::whereIn('id', $favoritedArtIds)->get();


        // 2. Ambil semua ID 'Medium' yang difavoritkan
        $favoritedMediumIds = $user->favorites()
            ->where('favorable_type', 'App\\Models\\Medium')
            ->pluck('favorable_id');

        // Ambil objek Medium DAN HITUNG JUMLAH ART-NYA
        // INI BAGIAN PENTING: withCount('arts') akan membuat properti 'arts_count'
        $favoritedTopics = Medium::withCount(['art as arts_count']) // Hitung relasi 'art', namai 'arts_count'
            ->whereIn('id', $favoritedMediumIds)
            ->get();

        return view('user.profil', compact('favoritedItems', 'favoritedTopics'));
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
