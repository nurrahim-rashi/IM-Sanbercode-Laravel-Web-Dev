@extends('layouts.public')

@section('title', 'Home')

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="mb-3 fw-bold">SanberBook</h1>
    <h2 class="mb-4">Social Media Developer Santai Berkualitas</h2>
    <h4 class="mb-5 text-muted">Belajar dan Berbagi agar hidup ini semakin santai berkualitas</h4>

    <div>
      <h3>Cara Bergabung ke SanberBook</h3>
      <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="{{ route('register') }}">Form Sign Up</a></li>
        <li>Selesai!</li>
      </ol>
    </div>
  </div>
</section>
@endsection
