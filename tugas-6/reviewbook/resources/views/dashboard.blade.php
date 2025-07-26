@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="col-md-9 p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Selamat datang, {{ Str::title(Auth::user()->name) }}</h2>
            </div>
        </div>

        <h4 class="fw-bold mb-3">Komentar Terbaru</h4>

        @forelse ($recentComments as $comment)
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex gap-4 align-items-start">
                {{-- Thumbnail Buku --}}
                <div style="width: 100px; height: 140px; overflow: hidden; border-radius: 0.5rem;">
                    <img 
                        src="{{ $comment->book->image_url ? $comment->book->image_url : asset('images/' . $comment->book->image) }}" 
                        alt="{{ $comment->book->title }}" 
                        style="width: 100%; height: 100%; object-fit: cover;"
                        onerror="this.src='https://via.placeholder.com/100x140?text=No+Image';"
                    >
                </div>

                {{-- Info Komentar --}}
                <div class="flex-grow-1">
                    <h5 class="mb-1">{{ Str::title($comment->book->title) }}</h5>
                    <p class="mb-1 text-muted">Mendapat komentar baru:</p>
                    <blockquote class="fst-italic">"{{ $comment->content }}"</blockquote>
                    <div class="text-muted small">
                        oleh {{ Str::title($comment->user->name) }} - {{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card bg-white border shadow-sm">
            <div class="card-body">
                <p class="text-muted">Belum ada komentar terbaru.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
