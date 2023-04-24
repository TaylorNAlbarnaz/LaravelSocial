<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Data Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Logs in to the newly created user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid email or password!');
        }

        // Redirects to the dashboard
        return redirect()->route('dashboard');
    }
}