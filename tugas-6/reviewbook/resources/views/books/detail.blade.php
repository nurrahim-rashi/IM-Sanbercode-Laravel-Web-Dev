@extends('layouts.sidebar')
@section('title', 'Detail Buku') 

@section('content')
<div class="container py-5">
    <a href="{{ url('/books') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="card-title fw-bold">Detail Buku</h2>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="d-flex gap-2">
            <a href="{{ url('/books/' . $book->id . '/edit') }}" class="btn btn-outline-primary">✏️ Edit</a>
            <form action="{{ url('/books/'.$book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">🗑️ Hapus</button>
            </form>
        </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body d-flex gap-4 align-items-start">
            <div style="flex: 0 0 300px; height: 400px; overflow: hidden; border-radius: 0.5rem;">
<img 
    src="{{ $book->image_url ? $book->image_url : asset('images/' . $book->image) }}" 
    alt="{{ $book->title }}" 
    style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.5rem;"
>
            </div>
            <div>
                <h2 class="card-title fw-bold">{{ Str::title($book->title) }}</h2>
                <h5 class="card-title fw-bold">Deskripsi</h5>
                <p class="card-text">{{ Str::ucfirst($book->content) }}</p>

                <h5 class="card-title mt-4 fw-bold">Genre</h5>
                <p class="card-text">{{ $book->genre->name ?? '-' }}</p>

                <h5 class="card-title mt-4 fw-bold">Stok</h5>
                <p class="card-text">{{ $book->stock ?? 'Tidak tersedia' }}</p>
            </div>
        </div>

        <div class="card-body d-flex flex-column gap-4 w-100 align-items-start">
            <h4>Komentar</h4>

            @auth
            <form action="{{ route('comments.store', $book->id) }}" method="POST" class="w-100">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" placeholder="Tulis komentar..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            @endauth
        </div>

        <div class="card-body d-flex flex-column gap-4 w-100 align-items-start">
            @forelse($book->comments as $comment)
                <div class="mb-3 border p-3 rounded w-100">
                    <strong>{{ Str::title($comment->user->name) }}</strong> <br>
                    {{ $comment->content }}
                    <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p>Belum ada komentar.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
