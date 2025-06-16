<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Medium::query();

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
            $query->orderBy('id', 'asc');
        }

        $mediums = $query->paginate(10);
        /* SELECT * FROM mediums LIMIT 10 OFFSET 0; */
        /* SELECT * FROM mediums WHERE name LIKE '%search%' LIMIT 10 OFFSET 0; */
        /* SELECT * FROM mediums ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM mediums ORDER BY name DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM mediums ORDER BY id ASC LIMIT 10 OFFSET 0; */

        // ATAU FITUR SEARCH + SORT
        /* SELECT * FROM mediums WHERE name LIKE '%search%' ORDER BY name ASC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM mediums WHERE name LIKE '%search%' ORDER BY name DESC LIMIT 10 OFFSET 0; */

        return view('admin.media.index', compact('mediums'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

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
        /* INSERT INTO mediums (name, desc, img_url) VALUES ('name', 'desc', 'img_url'); */

        return redirect()->route('admin.media.index');
    }

    public function edit($id)
    {
        $medium = Medium::findOrFail($id);
        /* SELECT * FROM mediums WHERE id = 'id' */
        return view('admin.media.edit', compact('medium'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'desc' => 'nullable|string',
            'img_url' => 'nullable|string',
        ]);

        $medium = Medium::findOrFail($id);
        /* SELECT * FROM mediums WHERE id = 'id' */
        $medium->fill($validated);
        $medium->save();
        /* UPDATE mediums SET name = 'name', desc = 'desc', img_url = 'img_url' WHERE id = 'id' */

        return redirect()->route('admin.media.index');
    }

    public function destroy($id)
    {
        $medium = Medium::findOrFail($id);
        /* SELECT * FROM mediums WHERE id = 'id'; */
        $medium->delete();
        /* DELETE FROM mediums WHERE id = 'id'; */

        return redirect()->route('admin.media.index');
    }
}
