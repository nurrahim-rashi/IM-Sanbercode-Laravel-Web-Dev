@extends('layouts.public')

@section('title', 'Register')

@section('content')
<div class="container py-5" style="max-width: 600px">
    <h1 class="mb-3 fw-bold text-center">Buat Akun Baru</h1>

    {{-- Tampilkan error kalau ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required minlength="6">
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary fw-bold">✨ Sign Up Sekarang!</button>
        </div>
    </form>
</div>
@endsection
