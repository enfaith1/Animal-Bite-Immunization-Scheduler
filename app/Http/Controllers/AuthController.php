<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        //TODO:
        // return view('auth.register'); Show registration page
    }

    public function showLogin()
    {
        //TODO:
        // return view('auth.login'); Show login page
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed' // Confirm password in form using 'name="password_confirmation"'
        ]);

        $user = User::create($validated);
        Auth::login($user);

        return redirect()->route(''); //TODO: Insert route to dashboard
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        
       if  (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route(''); //TODO: Insert route to dashboard
       }

       throw ValidationException::withMessages([
        'credentials' => 'Incorrect credentials.'
       ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); //Logs out current user

        $request->session()->invalidate(); //removes data associated with session
        $request->session()->regenerateToken(); //regenerates crsf token for new session

        return redirect()->route(''); //TODO: Insert route to login page
    }
}
