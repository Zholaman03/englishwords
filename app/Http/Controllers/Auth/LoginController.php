<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request){
        
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if($auth){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
}
