<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('user')->latest()->paginate(12);
        return view('news.index', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        return view('news.show', compact('berita'));
    }
}
