@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="breadcrumbs">
            <a href="{{ route('home.index')  }}">← Барлық сөздер</a> <span class="muted">/</span> <span
                id="crumbWord">addiction</span>
        </div>

        <section class="wordTop">
            <div class="wordTitle">
                <h1 id="wEn">{{ $word->word }}</h1>
                <div class="meta">
                    <span class="chip">Level: <span id="wLevel">{{ $word->level->name }}</span></span>
                    <span class="phon" id="wPhon">[{{ $word->pronunciation }}]</span>
                </div>
            </div>

            <div class="actionsTop">
                <button class="mini primary" id="speakBtn" type="button">🔊 Тыңдау</button>
                @if(Auth::check())
                    <form action="{{ route('user.save', $word->id) }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit"
                            class="mini {{ Auth::user()->savedWords->contains($word->id) ? 'star active' : 'star' }}">
                            {{ Auth::user()->savedWords->contains($word->id) ? 'Remove from Saved' : 'Save Word' }}
                        </button>
                    </form>
                @endif
               

            </div>
        </section>

        <section class="infoGrid" aria-label="Негізгі ақпарат">
            <div class="block">
                <div class="label">📌 Definition</div>
                <div class="value muted" id="wDef">{{ $word->definition }}</div>
            </div>

            <div class="block">
                <div class="label">🧩 Example</div>
                <div class="value" id="wEx">{{ $word->example }}</div>
            </div>

            <div class="block" style="grid-column: 1 / -1;">
                <div class="label">🌍 Translation</div>
                <div class="value" id="wKz">{{  $word->example_translation }}</div>

            </div>
        </section>

        <section class="ai" aria-label="Жасанды интеллект">
            <div class="aiHead" id="main-btns">
                <b>🤖 Жасанды интеллектті пайдалану</b>
                <button class="chip" data-type="example">Мысал сөйлемдер</button>
                <button class="chip" data-type="usage">Қай кезде қолданылады?</button>
                <button class="chip" data-type="translation">Орысша аудармасы</button>
            </div>
            <form id="gpt-query-form"></form>
            <div class="aiForm">

                <input type="hidden" id="gpt-word" value="{{ $word->word }}" />
                <input id="gpt-question" type="text"
                    placeholder="GPT моделі 'addiction' туралы: мысал, қолдану, аударма..." />
                <button class="btn primary" id="gpt-query-btn" type="button">Сұрау</button>

            </div>
            </form>
            <div id="gpt-answer" class="hint">
                <p>Жауапты алу үшін сұрақ қойыңыз немесе жоғарыдағы батырмалардың бірін басыңыз.</p>
            </div>
        </section>

    </div>
@endsection