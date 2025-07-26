@extends('layouts.sidebar')

@section('title')
    Daftar Genre
@endsection

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Genre</h2>
        @if(auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ url('/genres/create') }}" class="btn btn-primary">
                + Tambah Genre Baru
            </a>
        @endif
    </div>

    <div class="table-responsive shadow-sm rounded">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Genre</th>
                <th scope="col">Deskripsi</th>
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <th scope="col">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $index => $genre)
                <tr onclick="window.location='{{ url('/genres/'.$genre->id) }}';" style="cursor: pointer;">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ url('/genres/'.$genre->id.'/edit') }}" class="btn btn-sm btn-outline-secondary me-1" title="Edit Genre">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ url('/genres/'.$genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus genre ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Genre">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->user() && auth()->user()->role === 'admin' ? 4 : 3 }}" class="text-center text-muted">Belum ada genre ditambahkan 😢</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
