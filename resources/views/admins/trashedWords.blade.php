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

        

        
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Сөз</th>
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
                        @foreach($trashed_words as $word)
                            <tr>
                                <td>{{ $word->word }}</td>
                                <td>{{ $word->translation }}</td>
                                <td>{{ $word->example }}</td>
                                <td>{{ $word->example_translation }}</td>
                                <td>{{ $word->pronunciation }}</td>
                                <td>{{ $word->definition }}</td>
                                <td>{{ $word->level->name }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                {{ $trashed_words->links('pagination::bootstrap-5') }}
                </div>
           
    </div>

@endsection