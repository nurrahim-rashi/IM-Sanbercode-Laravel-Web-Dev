@extends('layouts.sidebar')

@section('title', 'Edit Profile')

@section('content')
<div class="container py-5">
    <a href="{{ url('/books') }}" class="btn btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
  <h2 class="fw-bold mb-4">Edit Profile</h2>

  <form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="age" class="form-label">Umur</label>
      <input type="number" name="age" class="form-control" value="{{ old('age', $profile->age) }}" required>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <textarea name="address" rows="3" class="form-control" required>{{ old('address', $profile->address) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update Profile</button>
  </form>
</div>
@endsection
