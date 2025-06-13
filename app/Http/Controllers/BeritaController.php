<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Remove the __construct method entirely

    public function index()
    {
        $beritas = Berita::with('user')->latest()->paginate(10);
        return view('beritas.index', compact('beritas'));
    }

    public function create()
    {
        return view('beritas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:10|max:255',
            'content' => 'required|string|min:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        Berita::create([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $photoPath,
            'author' => $request->author,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('beritas.index')->with('success', 'News created successfully!');
    }

    public function show(Berita $berita)
    {
        return view('beritas.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('beritas.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title' => 'required|string|min:10|max:255',
            'content' => 'required|string|min:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'required|string|max:255',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
        ];

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($berita->photo) {
                Storage::disk('public')->delete($berita->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $berita->update($data);

        return redirect()->route('beritas.index')->with('success', 'News updated successfully!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->photo) {
            Storage::disk('public')->delete($berita->photo);
        }
        
        $berita->delete();

        return redirect()->route('beritas.index')->with('success', 'News deleted successfully!');
    }
}
