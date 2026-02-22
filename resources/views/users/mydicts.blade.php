@extends('layouts.user')

@section('content')

<div>
    <h3>
        Мен білетін сөздер 
    </h3>
    <span>Барлығы: {{ $savedWords->count() }}</span>
    <p>
        Статистика
        <hr>
        <p>
            <ul>
                @foreach($levels as $level)
                    <li>
                        {{ $level->name }}: {{ $level->dictionary()->whereHas('users', fn($query) => $query->where('user_id', auth()->id()))->count() }} |{{ $level->dictionary()->count() }} сөз
                    </li>
                @endforeach
            </ul>
        </p>
    </p>
</div>
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
        @forelse($savedWords as $index => $word)
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
            </tr>
        @empty
            <tr>
                <td colspan="4">No words found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection