@extends('layouts.user')

@section('content')

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Сөздіктер</th>
            <th>Мағынасы</th>
            <th>Аудармасы</th>
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
                
            </tr>
        @empty
            <tr>
                <td colspan="4">No words found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection