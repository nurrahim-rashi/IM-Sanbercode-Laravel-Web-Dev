<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title') - SanberBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #fff;
    }

    .public-header {
      padding: 1rem 2rem;
      background-color: #fff;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .public-header a {
      text-decoration: none;
      font-weight: bold;
      color: #000;
    }

    .public-header a:hover {
      color: #0d6efd;
    }

    .btn-login {
      font-weight: 600;
      color: #ffffff;
    }
    
    .main {
      padding: 2rem;
    }
  </style>
</head>
<body>

  <header class="public-header">
    <a href="/" class="logo">SanberBook<span style="color:#0d6efd;">.</span></a>
    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
  </header>

  <main class="main">
    @yield('content')
  </main>

</body>
</html>
