@extends('layouts.sidebar')
@section('title', 'Tambah Buku Baru') 
@section('content')

<div class="container py-5">
    <a href="{{ url('/books') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h2>Tambah Buku Baru</h2>

    <form action="{{ url('/books') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group my-2">
            <label for="title">Judul Buku</label>
            <input type="text" name="title" class="form-control" placeholder="Masukkan judul buku" value="{{old('title')}}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-2">
            <label for="content">Deskripsi</label>
            <textarea name="content" class="form-control" placeholder="Tulis deskripsi buku">{{old('content')}}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-2">
            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Atau Masukkan URL Gambar</label>
                <input type="text" name="image_url" class="form-control" placeholder="https://example.com/cover.jpg">
            </div>

        <div class="form-group my-2">
            <label for="genre_id">Genre</label>
                <select name="genre_id" class="form-control" id="genreSelect">
                    <option value="">-- Pilih Genre --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                    <option value="other">Lainnya</option>
                </select>
                <div class="form-group my-2" id="newGenreField" style="display: none;">
                    <label for="new_genre">Tambah Genre Baru</label>
                    <input type="text" name="new_genre" class="form-control" placeholder="Masukkan genre baru">
                </div>
            @error('genre_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
    </form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const genreSelect = document.getElementById('genreSelect');
        const newGenreField = document.getElementById('newGenreField');

        genreSelect.addEventListener('change', function () {
            if (this.value === 'other') {
                newGenreField.style.display = 'block';
            } else {
                newGenreField.style.display = 'none';
            }
        });
    });
</script>
</div>
@endsection
