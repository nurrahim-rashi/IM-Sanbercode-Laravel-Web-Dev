@extends('layouts.sidebar')
@section('title', 'Detail Genre') 

@section('content')
<div class="container py-5">
    <a href="{{ url('/genres') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="card-title fw-bold">Detail Genre</h2>
        
        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="d-flex gap-2">
            <a href="{{ url('/genres/' . $genre->id . '/edit') }}" class="btn btn-outline-primary">✏️ Edit</a>
            <form action="{{ url('/genres/'.$genre->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus genre ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">🗑️ Hapus</button>
            </form>
        </div>
        @endif
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="card-title fw-bold">{{ Str::title($genre->name) }}</h2>
                    <h5 class="card-title fw-bold">Deskripsi</h5>
                    <p class="card-text">{{ Str::ucfirst($genre->description) }}</p>
    <h5 class="card-title fw-bold">Daftar Buku dalam Genre Ini</h5>
@if ($genre->books->isEmpty())
    <p class="text-muted">Belum ada buku di genre ini 😢</p>
@else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($genre->books as $book)
        <div class="col">
            <a href="{{ url('/books/' . $book->id) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm border-0">
                    <div style="height: 220px; overflow: hidden; border-radius: 0.5rem 0.5rem 0 0;">
                        <img 
                            src="{{ asset('images/' . $book->image) }}" 
                            class="w-100 h-100" 
                            alt="{{ $book->title }}" 
                            style="object-fit: cover;"
                        >
                    </div>
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-1">{{ Str::title($book->title) }}</h6>
                        <p class="text-muted small mb-0">{{ Str::limit($book->content, 80) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
