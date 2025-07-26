@extends('layouts.sidebar')
@section('title', 'Edit Buku') 
@section('content')


<div class="container py-5">
    <a href="{{ url('/books') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h2>Edit Buku</h2>

<form action="{{ url('/books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group my-2">
        <label for="title">Judul Buku</label>
        <input type="text" name="title" class="form-control" value="{{ $book->title }}">
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-2">
        <label for="content">Deskripsi</label>
        <textarea name="content" class="form-control" rows="6">{{ $book->content }}</textarea>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-2">
        <label for="genre_id">Genre</label>
        <select name="genre_id" class="form-control">
            <option value="">-- Pilih Genre --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genre_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group my-2">
        <label for="image">Ganti Cover Buku</label>
        <input type="file" name="image" class="form-control">
    <div class="form-group my-2">
    <label for="image_url">Atau Masukkan URL Gambar</label>
    <input type="text" name="image_url" class="form-control" value="{{ $book->image_url }}">
    @error('image_url')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror

@if($book->image || $book->image_url)
    <div class="mt-2">
        <p>Cover sekarang:</p>
        <img 
            src="{{ $book->image_url ? $book->image_url : asset('images/' . $book->image) }}" 
            alt="Cover" 
            width="120" 
            class="rounded shadow"
        >
    </div>
@endif

    <button type="submit" class="btn btn-primary mt-2">Update Buku ✏️</button>
</form>
</div>
@endsection
