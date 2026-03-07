@extends('layouts.app')
@section('content')
    <div class="top">
        <div>
            <div class="brand">EnglishApp • Training</div>
            <div class="muted">Тіркелусіз. Әр деңгейден рандомды түрде 5 сөзден тұратын тест</div>
        </div>
        <div class="pill">
            <span class="muted">Сұрақ №:</span> <strong id="step_word">1</strong>
            <span class="muted">Correct:</span> <strong id="correct">0</strong>
            <span class="muted">Қате:</span> <strong id="wrong">0</strong>
        </div>
    </div>

    <div class="progress" aria-label="progress">
        <div class="bar" id="bar"></div>
    </div>
    <div class="muted" style="margin:8px 0 14px;"><span id="pos">1</span>/<span id="total"></span> тапсырма</div>
    <div class="card">
        <div class="row">
            <div class="q">
                <div class="muted">Сөз (EN)</div>
                <h2 id="word_translation">...</h2>
                <div class="sub muted">
                    <span>KK: <span id="kk"></span></span>

                </div>
            </div>


            <div class="input">
                <label for="answer">Жауабың (EN)</label>

                <input id="answer" autocomplete="off" placeholder="Жазыңыз: apple" name="answer" required />
                <div class="btns">
                    <button class="primary" type="submit" id="checkBtn">Тексеру</button>

                </div>
                <div class="feedback" id="feedback">

                </div>

            </div>

        </div>

        <div class="meta muted">
            <div id="restart" style="cursor:pointer;">Қайта бастау</div>
            <div>@itechAtyrau</div>
        </div>
    </div>
@endsection