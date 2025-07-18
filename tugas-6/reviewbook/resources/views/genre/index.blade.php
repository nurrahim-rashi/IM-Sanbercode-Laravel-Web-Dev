@extends('layouts.master')

@section('title')
    Daftar Genre
@endsection

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Genre</h2>
        <a href="{{ url('/genres/create') }}" class="btn btn-primary">
            + Tambah Genre Baru
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Genre</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($genres as $index => $genre)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ Str::limit($genre->description, 50) }}</td>
                        <td>
                            <a href="{{ url('/genres/'.$genre->id) }}" class="btn btn-outline-info btn-sm me-1" title="Lihat Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ url('/genres/'.$genre->id.'/edit') }}" class="btn btn-outline-warning btn-sm me-1" title="Edit Genre">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ url('/genres/'.$genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus genre ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus Genre">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada genre yang ditambahkan 😢</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
