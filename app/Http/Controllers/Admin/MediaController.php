<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Medium::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'az') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort === 'za') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('id');
        }

        $mediums = $query->paginate(10);

        return view('admin.media.index', compact('mediums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'desc' => 'nullable|string',
            'img_url' => 'nullable|string',
        ]);

        $medium = new Medium();
        $medium->name = $validated['name'];
        $medium->desc = $validated['desc'];
        $medium->img_url = $validated['img_url'];
        $medium->save();

        return redirect()->route('admin.media.index');
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
    public function edit($id)
    {
        $medium = Medium::findOrFail($id);
        return view('admin.media.edit', compact('medium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'desc' => 'nullable|string',
            'img_url' => 'nullable|string',
        ]);

        $medium = Medium::findOrFail($id);
        $medium->fill($validated);
        $medium->save();

        return redirect()->route('admin.media.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medium = Medium::findOrFail($id);
        $medium->delete();

        return redirect()->route('admin.media.index');
    }
}
