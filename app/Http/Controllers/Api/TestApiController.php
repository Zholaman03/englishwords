<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    // Получить 10 случайных слов для теста
    public function index()
    {
        $words = Dictionary::select('translation', 'id')->inRandomOrder()->limit(10)->get();
        return response()->json($words);
    }

    // Проверить ответ пользователя на тест и показать результат
    public function check(Request $request){
        $word_kz_id = $request->input('word_kz_id');
        $word_en = $request->input('word_en');

        $word_en_id = Dictionary::where('word', $word_en)->first()->id ?? null;
        if($word_kz_id === $word_en_id && $word_en_id !== null){
            return response()->json(['result' => 'correct', 'status' => true]);
        } else {
            return response()->json(['result' => 'incorrect', 'status'=> false]);
        }
    }
}
