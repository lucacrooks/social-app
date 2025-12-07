<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }
}