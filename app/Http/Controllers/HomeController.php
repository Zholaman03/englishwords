<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use App\Models\Level;
class HomeController extends Controller
{
    // Показать главную страницу с английскими словами и уровнями сложности
    public function index(Request $request)
    {
       
        $words = Dictionary::all();
        
        
        return view('index', compact('words'));
    }

    // Показать страницу с деталями слова

    public function show($id)
    {
        
        $word = Dictionary::find($id);
        if (!$word) {
            return redirect()->route('notFound');
        }
        return view('engwords.itemword', compact('word'));
    }


    // Показать уровени сложности и слова для выбранного уровня
    public function level($id)
    {
        
        $words = Dictionary::where('level_id', $id)->get();
        $level_name = Level::where('id', $id)->first();
        
        if (!$words || !$level_name) {
            return redirect()->route('notFound');
        }
       
        return view('index', compact('words', 'level_name'));
    }

    // Показать страницу 404 при отсутствии слова или уровня
    public function test()
    {

        return view('engwords.test');
    }

}
