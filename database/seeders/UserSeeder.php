<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //makes a few accounts to seed comments with
        User::create([
            'username' => 'alice',
            'password' => Hash::make('password1'),
        ]);

        User::create([
            'username' => 'bob',
            'password' => Hash::make('password2'),
        ]);

        User::create([
            'username' => 'charlie',
            'password' => Hash::make('password3'),
        ]);
    }
}
