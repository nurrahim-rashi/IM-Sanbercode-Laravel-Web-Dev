@extends('layouts.master')

@section('title', 'Welcome - SanberBook')

@section('content')
<section class="py-5">
  <div class="container text-center">
    <h1 class="text-success">
      Selamat datang, {{ ucfirst(strtolower($firstName)) }} {{ ucfirst(strtolower($lastName)) }}!</h1>
    <h4 class="mt-4 text-muted">Terima kasih telah bergabung di <strong>SanberBook</strong>. Social Media kita bersama!</h4>
  </div>
</section>
@endsection
