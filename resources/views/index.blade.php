@extends('layouts.app')

@section('content')
    <div class="container my-5">

        <div class="text-center mb-4">
            <h1 class="display-4">
                @if(isset($level_name->name))
                    {{ $level_name->name }} words
                @else
                    Барлық сөздер
                @endif
            </h1>
            <h2 class="text-muted">Сөздер тізімі</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @if(!isset($words) || count($words) == 0)
                <div class="col-12 text-center">
                    <div class="alert alert-warning" role="alert">Сөздер табылмады</div>
                </div>
            @else
                @foreach ($words as $word)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $word->word }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $word->pronunciation }}</h6>
                                <p class="card-text">{{ $word->translation }}</p>
                                <a href="{{ route('home.show', $word->id) }}" class="btn btn-primary btn-sm">Толығырақ</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection