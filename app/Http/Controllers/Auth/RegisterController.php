<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Data Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|string|regex:/\w*$/|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:8|max:16'
        ]);
        
        // Stores the user in the database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Logs in to the newly created user
        auth()->attempt($request->only('email', 'password'));

        // Redirects to the dashboard
        return redirect()->route('dashboard');
    }
}
