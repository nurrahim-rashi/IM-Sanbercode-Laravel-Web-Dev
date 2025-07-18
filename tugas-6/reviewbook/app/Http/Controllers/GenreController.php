<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:20',
            'description' => 'required|string|min:10|max:1000',
        ]);

        $now = Carbon::now();

        DB::table('genres')->insert([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect('/genres')->with('success', 'Mantap! Genre berhasil ditambahkan! ✨');
    }
    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genre.index', compact('genres'));
    }
    public function show($id)
    {
        $genre = DB::table('genres')->find($id);
        return view ('genre.detail', ['genre'=>$genre]);
    }
    public function edit($id)
    {
        $genre = DB::table('genres')->find($id);
        return view ('genre.edit', ['genre'=>$genre]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:20',
            'description' => 'required|string|min:10|max:1000',
        ]);

        DB::table('genres')
            ->where('id', $id)
            ->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'updated_at' => Carbon::now(),
            ]);
        return redirect('/genres')->with('success', 'Genre berhasil diperbarui! ✨');
    }
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect('/genres')->with('success', 'Genre berhasil dihapus 🗑️');
    }
}
