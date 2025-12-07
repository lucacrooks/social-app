<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Load all the user's posts
        $user->load('posts');

        return view('users.show', compact('user'));
    }
}
