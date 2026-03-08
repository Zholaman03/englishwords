@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favouritePage.css') }}">
@endpush

@section('content')


<div class="header-fav">
    <h3>
        Избранные слова
    </h3>
    <div>
        <form action="{{ route('user.favourites') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Вы действительно хотите очистить избранное?')">Очистить</button>
        </form>
       
    </div>
    <span>Барлығы: {{ $favourites->count() }}</span>
</div>

@if (session('success'))
    <div class="alert-success-modern">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Сөздіктер</th>
            <th>Мағынасы</th>
            <th>Аудармасы</th>
            <th>
                Деңгей
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($favourites as $index => $word)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $word->word }}</td>
                <td>{{ $word->definition }}</td>
                <td>
                    {{ $word->translation }}
                </td>
                <td>
                    {{ $word->level->name }}
                </td>
                <td>
                    <form action="{{ route('user.save', $word->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Сөзді шынымен жойғыңыз келе ме?')">Убрать</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No words found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection