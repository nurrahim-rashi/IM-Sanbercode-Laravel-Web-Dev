<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Genre::create([
            'name' => Str::title($request->name),
            'description' => Str::ucfirst($request->description),
        ]);

        return redirect('/genres')->with('success', 'Genre berhasil ditambahkan!');
    }

public function index()
{
    $genres = Genre::all();
    return view('genre.index', compact('genres'));
}

public function show($id)
    {
        $genre = Genre::with('books')->findOrFail($id);
        return view ('genre.detail', compact('genre'));
    }
    public function edit($id)
    {
        $genre = DB::table('genres')->find($id);
        return view ('genre.edit', ['genre'=>$genre]);
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $genre = Genre::find($id);
    $genre->update([
        'name' => Str::title($request->name),
        'description' => Str::ucfirst($request->description),
    ]);

    return redirect('/genres')->with('success', 'Genre berhasil diperbarui!');
}

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect('/genres')->with('success', 'Genre berhasil dihapus 🗑️');
    }
}
