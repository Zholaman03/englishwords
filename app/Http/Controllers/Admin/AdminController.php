<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictinory;
use App\Models\Level;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return (view('admins.profile'));
        
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
        
        Dictinory::create($validated);

        return redirect()->route('home.index')->with('success', 'Word added successfully');
    }

    public function edit($id)
    {
        $dictinory = Dictinory::findOrFail($id);
        
        $levels = Level::all();
        return view('admins.edit', compact('dictinory', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $dictinory = Dictinory::findOrFail($id);
        
        $dictinory->update([
            'word' => $request->word,
            'definition' => $request->definition,
            'example' => $request->example,
            'translation' => $request->translation,
            'example_translation' => $request->example_translation,
            'pronunciation' => $request->pronunciation,
            'level_id' => $request->level_id,
        ]);

        return redirect()->route('home.index')->with('success', 'Word updated successfully');
    }


    public function destroy($id)
    {
        $dictinory = Dictinory::findOrFail($id);
        $dictinory->delete();

        return redirect()->route('home.index')->with('success', 'Word deleted successfully');
    }
}
