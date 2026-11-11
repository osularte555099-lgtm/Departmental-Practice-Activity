<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Plant Nursery')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-success mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('plants.index') }}">🌿 Plant Nursery</a>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-light btn-sm" href="{{ route('plants.index') }}">Plants</a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('reports.index') }}">Reports</a>
            {{-- Logout must be a POST form with CSRF --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    {{-- Flash message after add / update / delete --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>