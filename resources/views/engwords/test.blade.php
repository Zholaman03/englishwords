@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h4 class="mb-4">Тест</h4>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('home.checkTest') }}" method="POST" class="border p-3 rounded shadow-sm" style="max-width: 500px; font-size: 0.9rem;">
            @csrf
            <div class="mb-2">
                <input type="hidden" name="word_id" value="{{ $word->id }}">
                <h5 class="text-primary">{{ $word->word }}</h5>
            </div>
            <div class="mb-2">
                
                <input type="text" placeholder="ЖАУАБЫ" class="form-control form-control-sm" id="word" name="answer" required>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Тестті өткізу</button>
        </form>
    </div>
@endsection