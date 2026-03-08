<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @stack('styles')
   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
      
</head>

<body>
    <header class="header">
        <div class="wrap">
            <div class="row">
                <div class="brand">EnglishApp</div>

                <nav class="nav" aria-label="Навигация">
                    <a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index') }}">📚 Сөздіктер</a>
                    <a class="{{ request()->routeIs('home.test') ? 'active' : '' }}" href="{{ route('home.test') }}">🎯 Аудармасын тап</a>
                    <a class=" {{ request()->routeIs('user.flashcard') ? 'active' : '' }}" href="{{ route('user.flashcard', 1) }}">🃏 Өз өзіңді тексер</a>
               
                    <a class="{{ request()->routeIs('user.favourites') ? 'active' : '' }}" href="{{ route('user.favourites') }}">⭐ Керек сөздіктерім</a>
                
                </nav>

                <div class="spacer"></div>
                @guest
                    <a href="{{ route('login') }}" class="btn">Кіру</a>
                    <a href="{{ route('register') }}" class="btn primary">Тіркелу</a>
                @else
        
                    @if(Auth::user()->role->name == 'admin')
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">Администратор</a>
                    @elseif(Auth::user()->role->name == 'user')
                        <a href="{{ route('user.profile') }}" class="btn btn-outline-secondary">Жеке аккаунт</a>
                    @endif
                @endguest
            
            </div>
        </div>
    </header>

    <main class="wrap">


        @yield('content')
    </main>


    @stack('scripts')
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>