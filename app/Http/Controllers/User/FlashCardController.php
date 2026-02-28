<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Level;
use App\Models\WordProgress;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FlashCardController extends Controller
{

    // Показать карточку слова и статистику по уровню
    public function index($id)
    {
        $word = Dictionary::inRandomOrder()
            ->where('level_id', $id)
            ->whereDoesntHave('users', fn($q) => $q->where('users.id', auth()->id())->where('word_progress.status', 'known'))
            ->first();
        $count = Dictionary::where('level_id', $id)->count();

        $knownCount = DB::table('word_progress as uw')
            ->join('dictionaries as d', 'd.id', '=', 'uw.dictionary_id')
            ->where('uw.user_id', auth()->id())
            ->where('d.level_id', $id)
            ->where('uw.status', 'known')
            ->count();

        $levels = Level::all();

        return view('flashcard.flashcard', compact('word', 'levels', 'count', 'knownCount'));
    }

    // Обновить статус слова (известно/неизвестно)

    public function check(Request $request)
    {


        WordProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'dictionary_id' => $request->word_id,
            ],
            [
                'status' => $request->answer,
            ]


        );
        return redirect()->back();
        ;
    }
}
