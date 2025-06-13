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
   public function index(Request $request)
    {
        $query = Art::with(['museum', 'medium'])->where('status', 'approved');

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'title_az') {
            $query->orderBy('title', 'asc');
        } elseif ($request->sort === 'title_za') {
            $query->orderBy('title', 'desc');
        } else {
            $query->orderBy('id', 'asc'); 
        }

        $arts = $query->paginate(10);

        return view('admin.art.index', compact('arts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $museums = Museum::orderBy('name', 'asc')->get();
        $mediums = Medium::orderBy('name', 'asc')->get();
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
            'medium_id' => 'required|exists:mediums,id',
        ]);

        $art = new Art();
        $art->title = $validated['title'];
        $art->created = $validated['created'];
        $art->desc = $validated['desc'];
        $art->creator = $validated['creator'];
        $art->img_url = $validated['img_url'];
        $art->museum_id = $validated['museum_id'];
        $art->medium_id = $validated['medium_id'];
        $art->status = 'pending';
        
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
    public function edit($id)
    {
        $art = Art::findOrFail($id);
        $museums = Museum::orderBy('name')->get();
        $mediums = Medium::orderBy('name')->get();

        return view('admin.art.edit', compact('art', 'museums', 'mediums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'created' => 'nullable|string',
            'desc' => 'nullable|string',
            'creator' => 'nullable|string',
            'img_url' => 'nullable|string',
            'museum_id' => 'required|exists:museums,id',
            'medium_id' => 'required|exists:mediums,id',
        ]);

        $art = Art::findOrFail($id);
        $art->fill($validated);
        $art->status = 'pending';
        $art->save();

        return redirect()->route('admin.art.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $art = Art::findOrFail($id);
        $art->delete();

        return redirect()->route('admin.art.index');
    }

    public function status(Request $request)
    {
        $arts = Art::orderBy('updated_at', 'desc');

        if ($request->has('status') && $request->status != '') {
            $arts->where('status', $request->status); 
        }

        $arts = $arts->get();

        return view('admin.art.status', compact('arts'));
    }


    public function approve($id)
    {
        $art = Art::findOrFail($id);
        $art->status = 'approved';
        $art->save();

        return back();
    }

    public function reject($id)
    {
        $art = Art::findOrFail($id);
        $art->status = 'rejected';
        $art->save();

        return back();
    }

}
