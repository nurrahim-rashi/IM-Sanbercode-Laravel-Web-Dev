@extends('layouts.sidebar')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><strong>{{ Str::title(Auth::user()->name) }}</strong></h2>
    <a href="{{ route('profile.edit') }}" class="btn btn-warning">✏️ Edit Profil</a>
</div>

  <div class="card shadow-sm p-4">
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Role:</strong> {{ Str::title(Auth::user()->role) }}</p>
    <p><strong>Umur:</strong> {{ $profile->age }}</p>
    <p><strong>Alamat:</strong> {{ Str::title($profile->address) }}</p>

  </div>
</div>
@endsection
