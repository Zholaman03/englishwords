@extends ('layouts.adm')

@section('content')
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="display-4">Сөздерді басқару</h2>
            <h4 class="text-muted">Сөздер тізімі</h4>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Жаңа сөз қосу</a>

        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Сөз (өзгертуге сілтеме)</th>
                    <th>Аударма</th>
                    <th>Мысал</th>
                    <th>Мысалдың аудармасы</th>
                    <th>Дыбысталу</th>
                    <th>Анықтама</th>
                    <th>Деңгейі</th>
                    <th>Әрекет</th>
                </tr>
            </thead>
            <tbody>
                @foreach($words as $word)
                    <tr>
                        <td><a href="{{ route('admin.edit', $word->id) }}" class="action-link">{{ $word->word }}</a></td>
                        <td>{{ $word->translation }}</td>
                        <td>{{ $word->example }}</td>
                        <td>{{ $word->example_translation }}</td>
                        <td>{{ $word->pronunciation }}</td>
                        <td>{{ $word->definition }}</td>
                        <td>{{ $word->level->name }}</td>
                        <td class="action-buttons ">
                            

                            <form action="{{ route('admin.destroy', $word->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link"
                                    onclick="return confirm('Сөзді шынымен жойғыңыз келе ме?')">Жою</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $words->links('pagination::bootstrap-5') }}
        </div>

    </div>

@endsection