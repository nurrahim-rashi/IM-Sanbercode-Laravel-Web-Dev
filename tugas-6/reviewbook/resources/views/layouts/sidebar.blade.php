<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title') - SanberBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Open Sans', sans-serif;
      background-color: #fff;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100vh;
      background: #fff;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.06);
      padding: 2rem 1.5rem;
      z-index: 1000;
      border-right: 1px solid #eee;
    }

    .sidebar .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: #000;
      display: flex;
      align-items: center;
    }

    .sidebar .logo span {
      color: #0d6efd;
      font-size: 2rem;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
      margin-top: 2rem;
    }

    .sidebar ul li {
      margin-bottom: 1rem;
    }

    .sidebar ul li a,
    .sidebar ul li form button {
      text-decoration: none;
      font-weight: 600;
      color: #333;
      display: block;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      transition: all 0.2s ease;
      background-color: transparent;
      width: 100%;
      text-align: left;
      border: none;
    }

    .sidebar ul li a:hover,
    .sidebar ul li form button:hover {
      background-color: #f1f1f1;
      color: #0d6efd;
    }

    .sidebar i {
      margin-right: 8px;
    }

    .main {
      margin-left: 260px;
      padding: 2rem;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }
  </style>
</head>
<body>

<aside class="sidebar">
  <div class="logo">
    <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="text-decoration-none text-dark">
      SanberBook<span>.</span>
    </a>
  </div>

  <ul class="mt-4">
    @auth
      <li>
        <a href="{{ route('dashboard') }}">
          <i class="bi bi-house-door"></i> Home
        </a>
      </li>
    @endauth

    <li>
      <a href="{{ url('/books') }}">
        <i class="bi bi-book"></i> Daftar Buku
      </a>
    </li>

    <li>
      <a href="{{ url('/genres') }}">
        <i class="bi bi-tags"></i> Daftar Genre
      </a>
    </li>

    {{-- Admin Only: Daftar Pengguna --}}
    @auth
      @if(Auth::user()->role === 'admin')
        <li>
          <a href="{{ url('/users') }}">
            <i class="bi bi-people"></i> Daftar Pengguna
          </a>
        </li>
      @endif

      <li>
        <a href="{{ url('/profile') }}">
          <i class="bi bi-person"></i> Profile
        </a>
      </li>

      <li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="text-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
          </button>
        </form>
      </li>
    @else
      {{-- Guest: Tampilkan tombol login --}}
      <li>
        <a href="{{ route('login') }}">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      </li>
    @endauth
  </ul>
</aside>

  <main class="main">
    @yield('content')
  </main>

</body>
</html>
