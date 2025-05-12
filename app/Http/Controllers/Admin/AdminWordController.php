<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictinory;
use Illuminate\Http\Request;

class AdminWordController extends Controller
{
    //
    public function words()
    {
        $words = Dictinory::paginate(5);
        return view('admins.words', compact('words'));
    }

    public function trashedWords()
    {
        $trashed_words = Dictinory::onlyTrashed()->paginate(5);
        return view('admins.trashedWords', compact('trashed_words'));
    }
}
