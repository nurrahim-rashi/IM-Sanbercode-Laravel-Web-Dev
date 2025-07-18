@extends('layouts.master')
@section('title', 'Detail Genre') 

@section('content')
<div class="container py-5">
    <a href="{{ url('/genres') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">{{ Str::title($genre->name) }}</h2>
<div class="d-flex gap-2">
    <a href="{{ url('/genres/' . $genre->id . '/edit') }}" class="btn btn-outline-primary">
        ✏️ Edit Genre
    </a>

    <form action="{{ url('/genres/'.$genre->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus genre ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>
</div>
</div>
</div>

    <div class="container">
                <h5 class="card-title">Deskripsi Genre</h5>
                <p class="card-text">{{ Str::ucfirst($genre->description) }}</p>
    </div>

@endsection
