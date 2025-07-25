<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $savedWords = Auth::user()->savedWords()->get();
        $users = User::all();
        return view('users.profile', compact('savedWords', 'users'));
    }

    public function words()
    {
        $user = Auth::user();
        $savedWords = $user->savedWords()->paginate(10);
        return view('users.mydicts', compact('savedWords'));
    }

    public function users(){
        $users = User::all();
        return view('users.usersChat', compact('users'));
    }
    public function save($id)
    {
        $user = Auth::user();
        $user->savedWords()->toggle($id);

        return redirect()->back()->with('success', 'Word saved successfully!');
    }

    
}
