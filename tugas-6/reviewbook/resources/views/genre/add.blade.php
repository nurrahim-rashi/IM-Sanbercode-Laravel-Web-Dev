@extends('layouts.master')
@section('title', 'Tambah Genre Baru') 
@section('content')

<div class="container py-5">
    <h1>Tambah Genre Baru</h1>
    <form action="/genres" method="POST">
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
        @csrf
        <div class="mb-3">
        <label for="genre name" class="form-label">Nama Genre</label>
        <input type="text" class="form-control" name="name" placeholder="Tulis nama genre" value="{{old('name')}}">
        </div>
        
        <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" rows="4" placeholder="Tulis deskripsi genre">{{old('description')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim 🚀</button>
    </form>
</div>


@endsection