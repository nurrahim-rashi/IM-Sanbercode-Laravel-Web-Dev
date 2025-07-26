<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Models\Genre;
 
class BookController extends Controller
{
    public function create()
    {
        $genres = \App\Models\Genre::all();
        return view('books.create', compact('genres'));
    }
 
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|mimes:jpg,jpeg,png',
        'image_url' => 'nullable|url',
        'genre_id' => ['required', 'not_in:'],
        'new_genre' => 'required_if:genre_id,other'
    ]);

    // Handle genre
    if ($request->genre_id === 'other') {
        $newGenre = new Genre;
        $newGenre->name = Str::title($request->new_genre);
        $newGenre->description = 'Custom genre';
        $newGenre->save();

        $genreId = $newGenre->id;
    } else {
        $genreId = $request->genre_id;
    }

    // Bikin book baru dulu
    $book = new Book;
    $book->title = Str::title($request->title);
    $book->content = Str::ucfirst($request->content);
    $book->genre_id = $genreId;

    // Handle gambar
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $book->image = $filename;
        $book->image_url = null;
    } elseif ($request->input('image_url')) {
        $book->image_url = $request->input('image_url');
        $book->image = null;
    } else {
        $book->image = 'default.jpg';
        $book->image_url = null;
    }

    $book->save();

    return redirect('/books')->with('success', 'Buku berhasil ditambahkan!');
}

public function index()
    {
        $book = Book::all(); // Ambil semua data buku
        return view('books.index', compact('book'));
    }

public function show($id)
{
    $book = Book::with(['comments.user', 'genre'])->findOrFail($id);
    return view('books.detail', compact('book'));
}


public function edit($id)
{
    $book = Book::findOrFail($id);
    $genres = Genre::all();

    return view('books.edit', compact('book', 'genres'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|mimes:jpg,jpeg,png',
        'genre_id' => 'required',
        'new_genre' => 'required_if:genre_id,other'
    ]);

    $book = Book::findOrFail($id);

    if ($request->genre_id === 'other') {
        $newGenre = new Genre;
        $newGenre->name = Str::title($request->new_genre);
        $newGenre->description = 'Custom genre';
        $newGenre->save();
        $genreId = $newGenre->id;
    } else {
        $genreId = $request->genre_id;
    }

    if ($request->hasFile('image')) {
        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $book->image = $newImageName;
    }

if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images'), $filename);
    $book->image = $filename;
    $book->image_url = null; // Prioritaskan file upload
} elseif ($request->input('image_url')) {
    $book->image_url = $request->input('image_url');
    $book->image = null;
}


    $book->title = Str::title($request->title);
    $book->content = Str::ucfirst($request->content);
    $book->genre_id = $genreId;

    $book->save();

    return redirect('/books')->with('success', 'Buku berhasil diupdate!');
}
    
public function destroy($id)
{
    $book = Book::find($id);

    if (!$book) {
        abort(404);
    }

    $book->delete();

    return redirect('/books')->with('success', 'Buku berhasil dihapus!');
}


}