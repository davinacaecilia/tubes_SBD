<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Medium;
use App\Models\Museum;
use Illuminate\Http\Request;

class ArtController extends Controller
{
   public function index(Request $request)
    {
        $query = Art::with(['museum', 'medium'])->where('status', 'approved');

        // FITUR SEARCH BY TITLE
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // FITUR SORT BY TITLE ASC (A-Z), DESC (Z-A), ATAU DEFAULT -> ASC (ID)
        if ($request->sort === 'title_az') {
            $query->orderBy('title', 'asc');
        } elseif ($request->sort === 'title_za') {
            $query->orderBy('title', 'desc');
        } else {
            $query->orderBy('id', 'asc'); 
        }

        $arts = $query->paginate(10);
        /* SELECT * FROM arts WHERE status = 'approved' LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'approved' AND title LIKE '%search%' LIMIT 10 OFFSET 10; */
        /* SELECT * FROM arts WHERE status = 'approved' ORDER BY title ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'approved' ORDER BY title DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'approved' ORDER BY id ASC LIMIT 10 OFFSET 0; */

        // ATAU FITUR SEARCH + SORT
        /* SELECT * FROM arts WHERE status = 'approved' AND title LIKE '%search%' ORDER BY title ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'approved' AND title LIKE '%search%' ORDER BY title DESC LIMIT 10 OFFSET 0; */

        return view('admin.art.index', compact('arts'));
    }

    public function create()
    {
        $museums = Museum::orderBy('name', 'asc')->get();
        /* SELECT * FROM museums ORDER BY name ASC */
        $mediums = Medium::orderBy('name', 'asc')->get();
        /* SELECT * FROM mediums ORDER BY name ASC */
        return view('admin.art.create', compact('museums', 'mediums'));
    }

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
        /* INSERT INTO arts (title, created, desc, creator, img_url, museum_id, medium_id, status) VALUES ('title', 'created', 'desc', 'creator', 'img_url', 'museum_id', 'medium_id', 'pending'); */

        return redirect()->route('admin.art.index');
    }

    public function show(string $id)
    {
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id' */
        return view('admin.art.show', compact('art'));
    }

    public function edit($id)
    {
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id' */
        $museums = Museum::orderBy('name')->get();
        /* SELECT * FROM museums ORDER BY name */
        $mediums = Medium::orderBy('name')->get();
        /* SELECT * FROM mediums ORDER BY name */

        return view('admin.art.edit', compact('art', 'museums', 'mediums'));
    }

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
        /* SELECT * FROM arts WHERE id = 'id' */
        $art->fill($validated);
        $art->status = 'pending';
        $art->save();
        /* UPDATE arts SET title = 'title', created = 'created', desc = 'desc', creator = 'creator', img_url = 'img_url', museum_id = 'museum_id', medium_id = 'medium_id', status = 'pending' WHERE id = 'id' */

        return redirect()->route('admin.art.index');
    }

    public function destroy($id)
    {
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id'; */
        $art->delete();
        /* DELETE FROM arts WHERE id = 'id'; */

        return redirect()->route('admin.art.index');
    }

    public function status(Request $request)
    {
        $arts = Art::orderBy('updated_at', 'desc');

        // FILTER STATUS : PENDING, APPROVED, REJECTED
        if ($request->has('status') && $request->status != '') {
            $arts->where('status', $request->status); 
        }

        $arts = $arts->paginate(10);
        /* SELECT * FROM arts ORDER BY updated_at DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'status' ORDER BY updated_at DESC LIMIT 10 OFFSET 0; */

        return view('admin.art.status', compact('arts'));
    }


    public function approve($id)
    {
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id'; */
        $art->status = 'approved';
        $art->save();
        /* UPDATE arts SET status = 'approved' WHERE id = 'id'; */

        return back();
    }

    public function reject($id)
    {
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id'; */
        $art->status = 'rejected';
        $art->save();
        /* UPDATE arts SET status = 'rejected' WHERE id = 'id'; */

        return back();
    }
}
