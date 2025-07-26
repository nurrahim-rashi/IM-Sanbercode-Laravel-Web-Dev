@extends('layouts.sidebar')
@section('title', 'Daftar Buku') 

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Buku</h2>

        @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ url('/books/create') }}" class="btn btn-primary">
            + Tambah Buku Baru
        </a>
        @endif
    </div>

    @if ($book->count() === 0)
        <div class="alert alert-warning text-center">
            Belum ada buku yang ditambahkan 😢
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($book as $item)
                <div class="col">
                    <a href="{{ url('/books/' . $item->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm border-0">
                            <div style="height: 250px; overflow: hidden; border-radius: 0.5rem 0.5rem 0 0;">
                                <img 
                                    src="{{ $item->image_url ? $item->image_url : asset('images/' . $item->image) }}" 
                                    class="w-100 h-100" 
                                    alt="{{ $item->title }}" 
                                    style="object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/300x400?text=No+Image';"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-1">{{ Str::title($item->title) }}</h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">
                                    {{ Str::limit($item->content, 100) }}
                                </p>
                                <span class="badge bg-secondary mb-2">
                                    {{ $item->genre->name ?? 'Tanpa Genre' }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
