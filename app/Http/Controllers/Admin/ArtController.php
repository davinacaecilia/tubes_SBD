<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $user = auth()->user();
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

        return view('admin.art.index', compact('arts', 'user'));
    }

    public function create()
    {
        $user = auth()->user();
        $museums = Museum::orderBy('name', 'asc')->get();
        /* SELECT * FROM museums ORDER BY name ASC */
        $mediums = Medium::orderBy('name', 'asc')->get();
        /* SELECT * FROM mediums ORDER BY name ASC */
        return view('admin.art.create', compact('museums', 'mediums', 'user'));
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

    
    public function edit($id)
    {
        $user = auth()->user();
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id' */
        $museums = Museum::orderBy('name')->get();
        /* SELECT * FROM museums ORDER BY name */
        $mediums = Medium::orderBy('name')->get();
        /* SELECT * FROM mediums ORDER BY name */
        
        return view('admin.art.edit', compact('art', 'museums', 'mediums', 'user'));
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

        if (Auth::user()->role === 'admin') {
            $art->status = 'Pending Approval'; // Admin mengedit, status jadi pending
        } elseif (Auth::user()->role === 'supervisor') {
            $art->status = 'approved'; // Supervisor mengedit, langsung disetujui
        }

        $art->save();
        /* UPDATE arts SET title = 'title', created = 'created', desc = 'desc', creator = 'creator', img_url = 'img_url', museum_id = 'museum_id', medium_id = 'medium_id', status = 'pending' WHERE id = 'id' */
        
        return redirect()->route('admin.art.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        if (auth()->user()->role !== 'supervisor') {
            return redirect()->back()->with('error', 'You do not have permission to delete this item.');
        }

        // Jika yang mengakses adalah supervisor, lanjutkan proses hapus
        $art->delete();

        return redirect()->route('admin.art.index')->with('success', 'Art successfully deleted.');
    }
    
    public function status(Request $request)
    {
        $user = auth()->user();
        $arts = Art::orderBy('updated_at', 'desc');

        // FILTER STATUS : PENDING, APPROVED, REJECTED
        if ($request->has('status') && $request->status != '') {
            $arts->where('status', $request->status);
        }
        
        $arts = $arts->paginate(10);
        /* SELECT * FROM arts ORDER BY updated_at DESC LIMIT 10 OFFSET 0; */
        /* SELECT * FROM arts WHERE status = 'status' ORDER BY updated_at DESC LIMIT 10 OFFSET 0; */
        
        return view('admin.art.status', compact('arts', 'user'));
    }
    
    public function show(string $id)
    {
        $user = auth()->user();
        $art = Art::findOrFail($id);
        /* SELECT * FROM arts WHERE id = 'id' */
        return view('admin.art.show', compact('art', 'user'));
    }
    
    public function approve($id)
    {
        $art = Art::findOrFail($id);
        $art->status = 'Approved';
        $art->save();
        /* UPDATE arts SET status = 'approved' WHERE id = 'id'; */

        return redirect()->route('admin.art.status')->with('success', 'Art has been approved.');
    }

    public function reject($id)
    {
        $art = Art::findOrFail($id);
        $art->status = 'Rejected';
        $art->save();
        /* UPDATE arts SET status = 'rejected' WHERE id = 'id'; */

        return redirect()->route('admin.art.status')->with('success', 'Art has been rejected.');
    }
}
