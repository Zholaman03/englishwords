<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Dictionary;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserController extends Controller
{
    use AuthorizesRequests; // Добавляем трейт для авторизации

    // Показать профиль пользователя и сохраненные слова
    public function index()
    {
        $user = Auth::user();

        // Не грузим всю коллекцию, если нужно только количество — можно заменить на count()
        $savedWords = $user->savedWords;

        $totalWords = Dictionary::count();

        $progressStats = $user->wordProgress()
            ->selectRaw('SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as known_count, SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as unknown_count', ['known', 'unknown'])
            ->first();

        $knownWords = $progressStats->known_count ?? 0;
        $unknownWords = $progressStats->unknown_count ?? 0;

        $levels = Level::withCount('dictionary')->get();

        $result = Level::query()
            ->leftJoin('dictionaries', 'dictionaries.level_id', '=', 'levels.id')
            ->leftJoin('word_progress', function ($join) use ($user) {
                $join->on('word_progress.dictionary_id', '=', 'dictionaries.id')
                    ->where('word_progress.user_id', $user->id)
                    ->where('word_progress.status', 'known');
            })
            ->select(
                'levels.id',
                'levels.name',
                DB::raw('COUNT(dictionaries.id) as total_words'),
                DB::raw('COUNT(word_progress.id) as known_words_count')
            )
            ->groupBy('levels.id', 'levels.name')
            ->orderBy('levels.id')
            ->get()
            ->map(function ($item) {
                $item->percent = $item->total_words > 0
                    ? round(($item->known_words_count / $item->total_words) * 100)
                    : 0;

                return $item;
            });

        $completedLevels = $result
            ->filter(fn ($item) => $item->total_words > 0 && $item->known_words_count >= $item->total_words)
            ->pluck('name')
            ->toArray();

        $resultById = $result->keyBy('id');

        

        return view('layouts.userprofile', compact(
            'savedWords',
            'result',
            'resultById',
            'levels',
            'user',
            'knownWords',
            'unknownWords',
            'totalWords',
            'completedLevels'
        ));
    }

    // Показать сохраненные слова пользователя
    public function words()
    {
        $user = Auth::user();
        $savedWords = $user->savedWords()->with('level')->get();
        $levels = Level::all();

        return view('users.mydicts', compact('savedWords', 'levels'));
    }

    // Показать чат со всеми пользователями (для общения и обмена опытом)
    public function users()
    {
        $users = User::all();
        return view('users.usersChat', compact('users'));
    }

    public function favourites()
    {
        $user = Auth::user();
        $favourites = $user->savedWords()->with('level')->get();

        return view('users.favourites', compact('favourites'));
    }

    public function clearFavourites()
    {
        $user = Auth::user();
        $user->savedWords()->detach(); // Удаляем все связи с сохраненными словами

        return redirect()->back()->with('success', 'Избранное очищено!');
    }

    // Сохранить или удалить слово из избранного
    public function save($id)
    {
        $this->authorize('favourites', Dictionary::find($id));
        $user = Auth::user();
        $user->savedWords()->toggle($id);

        return redirect()->back()->with('success', 'Сөз сәтті қосылды!');
    }


    //
    public function editDataOfUser(ProfileUpdateRequest $request)
    {

        $user = Auth::user();

        // Валидация входных данных
        $user->update($request->validated());

        return redirect()->back()->with('success', 'Профиль успешно обновлен!');
    }




}
