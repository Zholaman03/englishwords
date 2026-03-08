@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/flashcard.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="topbar">
            <div class="brand">
                <h1>Күнделікті сөз жаттығуы</h1>
                <p>Сөзді білесің бе екенін тексер және күн сайын прогресті бақыла</p>
            </div>

            <select class="level-select" onchange="window.location.href=this.value;">
                @foreach($levels as $level)
                    <option value="/flashcard/{{ $level->id }}" {{ request('id') == $level->id ? 'selected' : '' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @if('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="main-grid">
            <section class="card training-card">
                <div>
                    <div class="pill">🎯 Күннің сөзі · 2 / 10</div>

                    <div class="word-block">
                        @if(!isset($word))
                            <h2 class="word">Сөз табылмады</h2>
                            <div class="divider"></div>
                            <p class="translation">Тамаша! Сіз {{ $levels->where('id', request('id'))->first()->name }}
                                деңгейінде барлық сөздерді меңгердіңіз</p>
                            
                        @else
                            <h2 class="word">{{ $word->word }}</h2>
                            <div class="divider"></div>
                            <p class="translation">{{ $word->translation }}</p>
                            <p class="hint">Бұл сөзді білесіз бе, жоқ па, таңдаңыз</p>

                        @endif
                    </div>
                </div>
                @if(isset($word))
                    <form action="{{ route('flashcard.check', $word->level_id) }}" method="post">
                        <div class="actions-fc">
                            @csrf
                            <input type="hidden" name="word_id" value="{{ $word->id }}">
                            <button class="btn-fc btn-yes" name="answer" value="known">Иә, білемін</button>
                            <button class="btn-fc btn-no" name="answer" value="unknown">Жоқ, білмеймін</button>
                        </div>
                    </form>
                @endif
            </section>

            <aside class="card side-panel">
                <div>
                    <h3 class="side-title">Прогрессіңіз</h3>
                    <p class="muted">Мақсат — {{ $count }} сөз жаттау (Деңгей:
                        {{ $levels->where('id', request('id'))->first()->name }})</p>
                </div>

                <div class="progress-box">
                    <div class="progress-row">
                        <span class="muted">Аяқталды</span>
                        <span class="progress-value">{{ $procent_known }}%</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:{{ $procent_known }}%"></div>
                    </div>
                    <p class="muted" style="margin-top:12px;">{{ $knownCount }} / {{ $count }} сөз бүгін</p>
                </div>

                <div class="stat-box">
                    <div class="progress-row" style="margin-bottom:14px;">
                        <span class="side-title" style="font-size:16px; margin:0;">Статистика</span>
                        <span class="muted">Апта бойынша</span>
                    </div>
                    <div class="stats-grid">
                        <div class="mini-stat">
                            <div class="label">Мен білмеймін</div>
                            <div class="value">{{ $procent_unknown }}%</div>
                            <div class="sub">{{ $count - $knownCount }} сөз</div>
                        </div>
                        <div class="mini-stat">
                            <div class="label">Мен білемін</div>
                            <div class="value">{{ $procent_known }}%</div>
                            <div class="sub">{{ $knownCount }} сөз</div>
                        </div>
                    </div>
                </div>

                <div class="streak-box">
                    <div class="streak">
                        <div>
                            <form action="{{ route('flashcard.reset') }}" method="post">
                                @csrf
                                <input type="hidden" name="level_id" value="{{ request('id') }}">
                                <button class=" badge" type="submit" onclick="return confirm('Прогресті қалпына келтіргіңіз келетініне сенімдісіз бе?')">Қалпына келтіру</button>
                            </form>
                        </div>
                      
                    </div>
                </div>
            </aside>
        </div>

    
    </div>

    
@endsection