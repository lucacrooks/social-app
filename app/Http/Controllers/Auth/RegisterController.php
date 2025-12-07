<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form
     */
    public function show()
    {
        return view('register');
    }

    /**
     * Handle the registration form submission
     */
    public function store(Request $request)
    {
        // Validate the form
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect to homepage or dashboard
        return redirect()->route('home')->with('success', 'Account created successfully!');
    }
}