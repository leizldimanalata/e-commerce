<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);

        $user = User::where('email', $validated['email'])
            ->first();

        if (!$user) {
            return back()->withErrors(['errors' => 'These credentials do not match our records.']);
        } else {
            if (Auth::attempt($validated)) {
                $request->session()->regenerate();

                // return ('logged in');

                return redirect()->intended('dashboard');
            } else
                return back()->withErrors(['errors' => 'Invalid credentials. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login()
    {
        return view('pages.login');
    }
}
