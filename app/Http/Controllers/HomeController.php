<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use App\Models\Level;
class HomeController extends Controller
{
    //
    public function index()
    {
        $words = Dictionary::all();
        
        
        return view('index', compact('words'));
    }

    public function show($id)
    {
        
        $word = Dictionary::find($id);
        if (!$word) {
            return redirect()->route('notFound');
        }
        return view('engwords.itemword', compact('word'));
    }

    public function level($id)
    {
        
        $words = Dictionary::where('level_id', $id)->get();
        $level_name = Level::where('id', $id)->first();
        
        if (!$words || !$level_name) {
            return redirect()->route('notFound');
        }
       
        return view('index', compact('words', 'level_name'));
    }

    public function test()
    {
        if (session()->has('word_id')) {
            $wordId = session('word_id');
            $word = Dictionary::find($wordId);
            session()->forget('word_id'); // Бір рет қолданамыз да, өшіреміз
        } else {
            $ids = Dictionary::pluck('id')->toArray();
            $randomIndex = rand(0, count($ids) - 1);
            $word = Dictionary::find($ids[$randomIndex]);
        }
    
        return view('engwords.test', compact('word'));
    }

    public function check(Request $request)
    {
      
        $answer = Dictionary::where('id', $request->word_id)->first()->translation;
       
        if(mb_strtolower(trim($request->answer), 'UTF-8') == mb_strtolower($answer) || str_contains(mb_strtolower($answer) , mb_strtolower(trim($request->answer), 'UTF-8'))){
            return redirect()->route('home.test')->with('success', 'Correct');
        } else {
            return back()->with('error', 'Incorrect')->with('word_id', $request->word_id);
        }
       
    }
    
}
