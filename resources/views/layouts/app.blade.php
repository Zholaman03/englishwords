<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/flashcard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
        <link rel="stylesheet" href="{{ asset('css/itemword.css') }}">
</head>

<body>
    <header class="header">
        <div class="wrap">
            <div class="row">
                <div class="brand">EnglishApp</div>

                <nav class="nav" aria-label="Навигация">
                    <a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index') }}">📚 Слова</a>
                    <a class="{{ request()->routeIs('home.test') ? 'active' : '' }}" href="{{ route('home.test') }}">🎯 Тренировка</a>
               
                    <a href="{{ route('user.words') }}">⭐ Избранное</a>
                    <a href="#">ℹ О приложении</a>
                </nav>

                <div class="spacer"></div>
                @guest
                    <a href="{{ route('login') }}" class="btn">Кіру</a>
                    <a href="{{ route('register') }}" class="btn primary">Тіркелу</a>
                @else
                    <a href="{{ route('auth.logout') }}" class="btn btn-outline-danger me-2">Шығу</a>
                    @if(Auth::user()->role->name == 'admin')
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Admin</a>
                    @elseif(Auth::user()->role->name == 'user')
                        <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary">Профиль</a>
                    @endif
                @endguest
            
            </div>
        </div>
    </header>

    <main class="wrap">


        @yield('content')
    </main>



    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/speech.js') }}"></script>
    <script src="{{ asset('js/checkWord.js') }}"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>