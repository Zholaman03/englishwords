<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class AdminWordController extends Controller
{
    //
    public function words()
    {
        $words = Dictionary::paginate(5);
        return view('admins.words', compact('words'));
    }

    public function trashedWords()
    {
        $trashed_words = Dictionary::onlyTrashed()->paginate(5);
        return view('admins.trashedWords', compact('trashed_words'));
    }
}
