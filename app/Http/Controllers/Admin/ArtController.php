<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Medium;
use App\Models\Museum;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arts = Art::with(['museum', 'medium'])->get();
        return view('admin.art.index', compact('arts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $museums = Museum::all();
        $mediums = Medium::all();
        return view('admin.art.create', compact('museums', 'mediums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'created' => 'nullable|string',
            'desc' => 'nullable|string',
            'creator' => 'nullable|string',
            'img_url' => 'nullable|string',
            'museum_id' => 'required|exists:museums,id',
            'medium_id' => 'required|exists:media,id',
        ]);

        $art = new Art();
        $art->title = $validated['title'];
        $art->created = $validated['created'];
        $art->desc = $validated['desc'];
        $art->creator = $validated['creator'];
        $art->img_url = $validated['img_url'];
        $art->museum_id = $validated['museum_id'];
        $art->medium_id = $validated['medium_id'];
        $art->save();

        return redirect()->route('admin.art.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function status()
    {
        return view('admin.art.status'); 
    }
}
