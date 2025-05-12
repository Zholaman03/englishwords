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

            
        </div>
    </div>
</div>
@endsection