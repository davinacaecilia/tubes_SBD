<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Museum;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function index(Request $request)
    {
        $query = Museum::query();

        // FITUR SEARCH BY NAME
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // FITUR SORT BY NAME ASC (A-Z), DESC (Z-A), ATAU DEFAULT -> ASC (ID)
        if ($request->sort === 'az') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort === 'za') {
            $query->orderBy('name', 'desc');
        } else {
            $query->orderBy('id');
        }

        $museums = $query->paginate(10);
        /* SELECT * FROM museums LIMIT 10 OFFSET 0; */
        /* SELECT * FROM museums WHERE name LIKE '%search%' LIMIT 10 OFFSET 0; */
        /* SELECT * FROM museums ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM museums ORDER BY name DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM museums ORDER BY id ASC LIMIT 10 OFFSET 0; */

        // ATAU FITUR SEARCH + SORT
        /* SELECT * FROM museums WHERE name LIKE '%search%' ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM museums WHERE name LIKE '%search%' ORDER BY name DESC LIMIT 10 OFFSET 0; */

        return view('admin.museum.index', compact('museums'));
    }

    public function create()
    {
        return view('admin.museum.create');
    }

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
        /* INSERT INTO museums (name, location, logo_url) VALUES ('name', 'location', 'logo_url'); */

        return redirect()->route('admin.museum.index');
    }

    public function edit($id)
    {
        $museum = Museum::findOrFail($id);
        /* SELECT * FROM museums WHERE id = 'id' */
        return view('admin.museum.edit', compact('museum'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'logo_url' => 'nullable|string',
        ]);

        $museum = Museum::findOrFail($id);
        /* SELECT * FROM mediums WHERE id = 'id' */
        $museum->fill($validated);
        $museum->save();
        /* UPDATE museums SET name = 'name', location = 'location', logo_url = 'logo_url' WHERE id = 'id' */

        return redirect()->route('admin.museum.index');
    }

    public function destroy($id)
    {
        $museum = Museum::findOrFail($id); 
        /* SELECT * FROM museums WHERE id = 'id'; */
        $museum->delete();
        /* DELETE FROM museums WHERE id = 'id'; */

        return redirect()->route('admin.museum.index');
    }
}
