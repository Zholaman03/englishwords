@extends('layouts.app')

@section('content')


    <section class="hero">
        <h1>📚 Все слова</h1>
        <p class="sub">Ищи слова, слушай произношение и добавляй в избранное.</p>
    </section>

    <section class="controls" aria-label="Поиск и сортировка">
        <div class="search">
            <span aria-hidden="true">🔎</span>
            <input id="search" type="search" placeholder="Найти слово… (например: apple)" autocomplete="off" />
        </div>

        <button class="btn" id="sortBtn" type="button" title="Сортировка">
            Сортировать: <span id="sortMode">A–Z</span>
        </button>
    </section>

    <section class="pillbar" aria-label="Фильтры">
        <a href="{{ route('home.index') }}" class="pill {{ request()->routeIs('home.index') ? 'active' : '' }}"
            data-filter="all" type="button">Все</a>
        @foreach (App\Models\Level::all() as $level)
            <a class="pill  {{
                request()->routeIs('home.level') && request()->route('id') == $level->id
                ? 'active'
                : ''
            }}" href="{{ route('home.level', $level->id) }}" data-filter="{{ $level->name }}"
                type="button">{{ $level->name }}</a>

        @endforeach


    </section>

    <section class="grid" id="grid" aria-label="Список слов">
        @if(!isset($words) || count($words) == 0)
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">Сөздер табылмады</div>
            </div>
        @else
            @foreach ($words as $word)
                <article class="card" data-word="{{ $word->word }}" data-level="{{ $word->level->name }}" data-tag="all">
                    <div class="topline">
                        <h3 class="word">{{ $word->word }}</h3>
                        <span class="level">{{ $word->level->name }}</span>
                    </div>
                    <div class="phon">{{ $word->pronunciation }}</div>
                    <div class="trans">
                        <div class="tr"><span class="flag">KZ</span> {{ $word->translation}}</div>

                    </div>
                    <div class="actions">
                        <button class="mini primary speak" type="button">🔊 Прослушать</button>

                        <form action="{{ route('user.save', $word->id) }}" method="post">
                            @csrf
                            <button class="mini star" type="submit">⭐ {{ Auth::check() && Auth::user()->savedWords->contains($word->id) ? 'В избранном' : 'В избранное' }}</button>
                        </form>
                            
                      
                        <a href="{{ route('home.show', $word->id) }}" class="mini link">Подробнее</a>
                    </div>
                </article>
            @endforeach
        @endif


    </section>
@endsection