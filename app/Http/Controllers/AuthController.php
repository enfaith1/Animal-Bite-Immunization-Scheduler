<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * Handles session-based login, registration, and logout.
 * Routes: GET/POST /login, GET/POST /register, POST /logout (see routes/web.php).
 */
class AuthController extends Controller
{
    /** GET /register — named route show.register */
    public function showRegister()
    {
        return view('auth.register');
    }

    /** GET /login — named route show.login (also used as post-logout landing) */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validated);
        
        Auth::login($user);

        // After register, same landing as login; intended() respects a saved URL if middleware sent them here first.
        return redirect()->intended(route('patients.index'));
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            // Mitigate session fixation after successful authentication.
            $request->session()->regenerate();

            // Send to patients list, or to the URL they tried before auth middleware redirected them to login.
            return redirect()->intended(route('patients.index'));
        }

        // Single message key matches auth.login view error display for failed attempts.
        throw ValidationException::withMessages([
            'credentials' => 'Incorrect credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
