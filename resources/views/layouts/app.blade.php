<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between align-items-center py-3 border-bottom">
            <div class="logo h4">EnglishApp</div>
            
            <nav class="nav">
                <a class="nav-link" href="/">Басты бет</a>
                <a class="nav-link" href="{{ route('home.test') }}">Аудармасын тап</a>
                <a class="nav-link" href="/contact">Байланыс</a>
            </nav>

            <div class="auth-buttons">
                @guest
                    <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Кіру</a>
                    <a href="{{ route('auth.registr') }}" class="btn btn-primary">Тіркелу</a>
                @else
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger me-2">Шығу</a>
                    <span class="text-muted"><a href="{{ route('admin.index') }}">{{ Auth::user()->name }}</a></span>
                @endguest
            </div>
                
        </header>

        <div class="my-4">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="/">Барлығы</a></li>
                @foreach (App\Models\Level::all() as $level)
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.level', $level->id) }}">{{ $level->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="main-content">
            @yield('content')
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>