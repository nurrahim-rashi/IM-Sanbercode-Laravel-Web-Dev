@extends('layouts.sidebar')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Pengguna</h2>
        {{-- Kalau mau fitur Add User nanti, bisa tambahin tombol di sini --}}
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <th scope="col">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ Str::title($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                                {{ Str::title($user->role) }}
                            </span>
                        </td>
                        @if(auth()->user() && auth()->user()->role === 'admin')
                            <td>
                                {{-- Optional future actions (edit/delete user, etc) --}}
                                <span class="text-muted">-</span>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data pengguna 😢</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
