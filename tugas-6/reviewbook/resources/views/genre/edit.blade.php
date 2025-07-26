@extends('layouts.sidebar')
@section('title', 'Edit Genre') 
@section('content')

<div class="container py-5">
        <a href="{{ url('/genres') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h1>Edit Genre {{ Str::title($genre->name) }}</h1>
    <form action="{{ url('/genres/'.$genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>OOPS!</strong> Ada yang kurang pas, nih 😢
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nama Genre</label>
            <input type="text" class="form-control" name="name" placeholder="Tulis nama genre" value="{{ old('name', $genre->name) }}">
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Tulis deskripsi genre">{{ old('description', $genre->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Genre ✏️</button>
    </form>
</div>
@endsection
