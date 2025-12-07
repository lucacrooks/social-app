<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SocialApp') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="text-lg font-bold text-gray-900 dark:text-white">FakeInstagram</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-gray-700 dark:text-gray-300">Logout</button>
                                </form>
                                <a href="{{ route('notifications.index') }}" class="relative inline-flex items-center">
                                    notifications
                                    @if (auth()->user()->unreadNotifications->count())
                                        <span class="absolute top-0 right-0 bg-red-600 text-white text-xs rounded-full px-1">
                                            {{ auth()->user()->unreadNotifications->count() }}
                                        </span>
                                    @endif
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-700 dark:text-gray-300">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>