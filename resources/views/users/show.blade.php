@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-white dark:bg-gray-800 shadow rounded-2xl mb-6 overflow-hidden p-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-2">
            {{ $user->username }}
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mb-4">
            Joined {{ $user->created_at->format('F Y') }}
        </p>
    </div>

    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4 text-center">
        {{ $user->username }}’s Posts
    </h2>

    @forelse ($user->posts as $post)
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl mb-6 overflow-hidden">
            <div class="p-4">
                @if ($post->image)
                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="Post image"
                        class="w-full rounded-lg mb-3"
                    >
                @endif

                @if ($post->caption)
                    <p class="text-gray-800 dark:text-gray-200 mb-2">{{ $post->caption }}</p>
                @endif

                <p class="text-xs text-gray-400">
                    Posted {{ $post->created_at->diffForHumans() }}
                </p>

                <a
                    href="{{ route('posts.show', $post) }}"
                    class="inline-block mt-2 text-blue-600 hover:underline"
                >
                    View Post
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-500 text-center">This user hasn’t posted anything yet.</p>
    @endforelse
</div>
@endsection