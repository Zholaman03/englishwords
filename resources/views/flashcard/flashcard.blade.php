@extends('layouts.user')

@section('content')
    <div class="my-5">

        @if(session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="">
          
                <div>
                    <select onchange="window.location.href=this.value;">
                        @foreach($levels as $level)
                            <option value="/flashcard/{{ $level->id }}" {{ request('id') == $level->id ? 'selected' : '' }}>
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="container-flashcard  p-4 mb-4 bg-light rounded ">
                @if(!isset($word))
                    <div class="w-100 align-items-center d-flex justify-content-center">
                        <div class="flashcard bg-primary bg-gradient text-white p-4 rounded">
                            <h3>Сөздер табылмады</h3>
                        </div>
                    </div>
                 @else
                    <div class="w-100 align-items-center d-flex justify-content-center">
                        <div class="flashcard bg-primary bg-gradient text-white p-4 rounded">
                            <h3>{{ $word->word }}</h3>
                            <hr>
                            <p>{{ $word->translation }}</p>
                        </div>
                    </div>
                    <div class="footer-flashcard">
                        <form action="{{ route('flashcard.check', $word->level_id) }}" method="post">
                            @csrf
                            <input type="hidden" name="word_id" value="{{ $word->id }}">

                            <button type="submit" name="answer" value="known" class="btn btn-success bg-gradient">
                                Иә, білемін
                            </button>

                            <button type="submit" name="answer" value="unknown" class="btn btn-danger bg-gradient">
                                Жоқ, білмеймін
                            </button>

                        </form>


                    </div>
               

                @endif
                </div>

                <div class="col-md-4 mb-4">
                    <div>
                        <p>
                            Progress
                        </p>
                        <hr>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <span> {{ $knownCount }} / {{ $count }} Words Today</span>
                        <hr>
                        <p>
                            Stats
                        </p>
                        <hr>
                        <span>
                            Words Reviewed: 15 <br>
                            Correct answers: 75% <br>
                        </span>
                    </div>
                </div>

          
        </div>

    </div>
@endsection