<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectUser(Auth::user());
        }
        // Using correct path based on listed directories
        return view('Front End.login_model');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return $this->redirectUser(Auth::user());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return $this->redirectUser(Auth::user());
        }
        return view('Front End.registration_model');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['nullable', 'string', 'in:student,instructor'],
            'terms' => ['required']
        ]);

        $user = User::create([
            'name' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'student',
        ]);

        Auth::login($user);

        return $this->redirectUser($user);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function redirectUser($user)
    {
        if ($user->role === 'instructor') {
            return redirect()->intended('/instructor/dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }
        
        return redirect()->intended('/');
    }
}
