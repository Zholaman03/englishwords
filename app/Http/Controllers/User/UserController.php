<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests; // Добавляем трейт для авторизации

    // Показать профиль пользователя и сохраненные слова
    public function index()
    {
        $savedWords = Auth::user()->savedWords()->get();
        
        $users = User::all();
        return view('users.profile', compact('savedWords', 'users'));
    }

        // Показать сохраненные слова пользователя
    public function words()
    {
        $user = Auth::user();
        $savedWords = Dictionary::whereHas('users', fn($query) => $query->where('user_id', $user->id))->get();
        $levels = Level::all();
        
        return view('users.mydicts', compact('savedWords', 'levels'));
    }

        // Показать чат со всеми пользователями (для общения и обмена опытом)
    public function users(){
        $users = User::all();
        return view('users.usersChat', compact('users'));
    }

    // Сохранить или удалить слово из избранного
    public function save($id)
    {
        $this->authorize('favourites', Dictionary::find($id));
        $user = Auth::user();
        $user->savedWords()->toggle($id);

        return redirect()->back()->with('success', 'Сөз сәтті қосылды!');
    }

    
}
