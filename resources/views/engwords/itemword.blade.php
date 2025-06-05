@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-primary">{{ $word->word }} <small class="text-muted">- {{ $word->pronunciation }}</small></h3>
            <p class="card-text">
                <strong>Definition:</strong> {{ $word->definition }}
            </p>
            <p class="card-text">
                <strong>Example:</strong> {{ $word->example }}
            </p>
            <p class="card-text">
                <strong>Translation:</strong> {{ $word->example_translation }}
            </p>

            <div id="gpt-response-section" class="mt-4"></div>
                <h5>Жасанды интелектті пайдалану</h5>
                <form id="gpt-query-form" class="d-flex mb-2">
                    <input type="hidden" id="gpt-word" value="{{ $word->word }}" />
                    <input type="text" id="gpt-question" class="form-control me-2" placeholder="GPT моделі '{{ $word->word }}'..." />
                    <button type="submit" id="gpt-query-btn" class="btn btn-success">Сұрау</button>
                </form>
                <div>
                    <ul class="d-flex justify-content-around list-unstyled " id="main-btns">
                        <li class="btn btn-secondary" data-type="example">Мысал сөйлемдер</li>
                        <li class="btn btn-secondary" data-type="usage">Қай кезде қолданылады?</li>
                        <li class="btn btn-secondary" data-type="translate">Орысша аудармасы</li>
                    </ul>
                </div>
                <div id="gpt-answer" class="alert alert-info"></div>
            </div>
           
        </div>
    </div>
    @if(Auth::check())
    <form action="{{ route('user.save', $word->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn {{ Auth::user()->savedWords->contains($word->id) ? 'btn-danger' : 'btn-success' }}">
            {{ Auth::user()->savedWords->contains($word->id) ? 'Remove from Saved' : 'Save Word' }}
        </button>
    </form>
    @endif
</div>
@endsection