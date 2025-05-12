@extends('layouts.adm')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Ағылшын тілінде сөздерді құру</h2>
        <form action="{{ route('admin.update', $dictinory->id) }}" method="POST" class="border p-4 rounded shadow-sm bg-light">
            {{-- CSRF token for security --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="word" class="form-label">Сөз:</label>
                <input type="text" class="form-control" value="{{ $dictinory->word }}" id="word" name="word" required>
            </div>

            <div class="mb-3">
                <label for="translation" class="form-label">Аударма:</label>
                <input type="text" class="form-control" id="translation" value="{{ $dictinory->translation }}" name="translation" required>
            </div>

            <div class="mb-3">
                <label for="example" class="form-label">Мысал:</label>
                <input type="text" class="form-control" id="example" value="{{ $dictinory->example }}" name="example" required>
            </div>

            <div class="mb-3">
                <label for="example_translation" class="form-label">Мысалдың аудармасы:</label>
                <input type="text" class="form-control" id="example_translation" value="{{ $dictinory->example_translation }}" name="example_translation" required>
            </div>

            <div class="mb-3">
                <label for="pronunciation" class="form-label">Дыбысталу:</label>
                <input type="text" class="form-control" id="pronunciation" value="{{ $dictinory->pronunciation }}" name="pronunciation" required>
            </div>

            <div class="mb-3">
                <label for="definition" class="form-label">Анықтама:</label>
                <textarea class="form-control" id="definition" name="definition" rows="3" required>{{ $dictinory->definition }}</textarea>
            </div>

            <div class="mb-3">
                <label for="level_of_word" class="form-label">Деңгейі:</label>
                <select class="form-select" id="level_of_word" name="level_id" required>
                    @foreach ($levels as $level)
                        <option @if($level->id == $dictinory->level_id) selected @endif value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Жіберу</button>
            </div>
        </form>
    </div>
@endsection