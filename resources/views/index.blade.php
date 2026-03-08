@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/chatToAI.css') }}">
@endpush
@section('content')


    <section class="hero">
        <h1>📚 Барлық сөздер</h1>
        <p class="sub">Сөздерді іздеу, дауыстап тыңдау </p>
    </section>
    <form action="{{ route('home.search') }}" method="get">
    <section class="controls" aria-label="Поиск и сортировка">
        <div class="search">
            <span aria-hidden="true">🔎</span>
            <input id="search" type="search" name="query" placeholder="Іздеу… (Мысалы: apple)" autocomplete="off" />
        </div>

        <button class="btn" type="submit" title="Сортировка">
            Іздеу
        </button>
    </section>
    </form>
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
                        <button class="mini primary speak" type="button" id="speakBtn">🔊 Тыңдау</button>

                        <form action="{{ route('user.save', $word->id) }}" method="post">
                            @csrf
                            <button class="mini star {{ Auth::check() && Auth::user()->savedWords->contains($word->id) ? 'active' : '' }}" type="submit">⭐
                                {{ Auth::check() && Auth::user()->savedWords->contains($word->id) ? 'Сақталған' : 'Сақтау' }}</button>
                        </form>


                        <a href="{{ route('home.show', $word->id) }}" class="mini link">Толығырақ</a>
                    </div>
                </article>
            @endforeach
        @endif

       
            <div id="chatBox" class="chat-box">
                <div class="chat-header">
                    <span>AI Assistant</span>
                    <button id="closeChat">✖</button>
                </div>

                <div id="chatMessages" class="chat-messages">
                    <div class="ai">Сәлем! Мен AI ассистентпін 🤖</div>
                    <div class="typing" id="typing"></div>
                </div>

                <div class="chat-input">
                    <input id="chatInput" placeholder="Хабарлама..." />
                    <button id="sendBtn">➤</button>
                </div>
            </div>
       

        <button id="fab">AI </button>

    </section>
@endsection

@push('scripts')
   
    <script src="{{ asset('js/speech.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/chatToAI.js') }}"></script>
@endpush