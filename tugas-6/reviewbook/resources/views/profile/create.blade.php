@extends('layouts.sidebar')

@section('title', 'Buat Profile')

@section('content')
<div class="container">
  <h2 class="fw-bold mb-4">Buat Profile</h2>

  <form action="{{ route('profile.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="age" class="form-label">Umur</label>
      <input type="number" name="age" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <textarea name="address" rows="3" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Profile</button>
  </form>
</div>
@endsection
