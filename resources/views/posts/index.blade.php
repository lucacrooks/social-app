@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Latest Posts</h1>

        @auth
            <a
                href="{{ route('posts.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition"
            >
                + Create Post
            </a>
        @endauth
    </div>

    @forelse ($posts as $post)
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl mb-6 overflow-hidden">
            <div class="p-4">
                <div class="flex items-center mb-3">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Posted by
                        <a href="{{ route('users.show', $post->user->username) }}"
                            class="font-semibold text-blue-600 hover:underline dark:text-blue-400">
                            {{ $post->user->username ?? 'Unknown' }}
                        </a>
                        <span class="text-xs text-gray-400">
                            • {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>

                @if ($post->image)
                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="Post image"
                        class="w-full rounded-lg mb-3"
                    >
                @endif

                @if ($post->caption)
                    <p class="text-gray-800 dark:text-gray-200 mb-3">{{ $post->caption }}</p>
                @endif

                <a href="{{ route('posts.show', $post) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    View {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No posts found.</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection