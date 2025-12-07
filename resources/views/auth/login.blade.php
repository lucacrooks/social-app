@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-2xl font-bold mb-6">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required
                class="w-full px-3 py-2 border rounded @error('username') border-red-500 @enderror">
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full px-3 py-2 border rounded @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Login
        </button>
    </form>
</div>
@endsection