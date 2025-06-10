<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Museum;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $museums = Museum::all();
        return view('admin.museum.index', compact('museums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.museum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'logo_url' => 'nullable|string',
        ]);

        $museum = new Museum();
        $museum->name = $validated['name'];
        $museum->location = $validated['location'];
        $museum->logo_url = $validated['logo_url'];
        $museum->save();

        return redirect()->route('admin.museum.index');
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
    public function destroy($id)
    {
        $museum = Museum::findOrFail($id);
        $museum->delete();

        return redirect()->route('admin.museum.index')->with('success', 'Museum deleted');
    }
}
