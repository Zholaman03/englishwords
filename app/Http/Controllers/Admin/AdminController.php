<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Level;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.profile');
    }

    public function create()
    {
        $levels = Level::all();
        return view('admins.create', [
            'levels' => $levels,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'word' => 'required|string|max:255',
            'definition' => 'required',
            'example' => 'required|string|max:255',
            'translation' => 'required|string|max:255',
            'example_translation' => 'required|string|max:255',
            'pronunciation' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);
        
        Dictionary::create($validated);

        return redirect()->back()->with('success', 'Сәтті қосылды!');
    }

    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        
        $levels = Level::all();
        return view('admins.edit', compact('dictionary', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);
        
        $dictionary->update([
            'word' => $request->word,
            'definition' => $request->definition,
            'example' => $request->example,
            'translation' => $request->translation,
            'example_translation' => $request->example_translation,
            'pronunciation' => $request->pronunciation,
            'level_id' => $request->level_id,
        ]);

        return redirect()->route('home.index')->with('success', 'Сәтті жаңартылды!');
    }


    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $dictionary->delete();

        return redirect()->route('home.index')->with('success', 'Сәтті жойылды!');
    }
}
