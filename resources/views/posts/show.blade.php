@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <!-- Post Card -->
    <article class="bg-white p-4 rounded-lg shadow mb-6">
        @if ($post->user_id === Auth::id())
            <div class="flex justify-end space-x-2 mb-2">
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </div>
        @endif

        <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="w-1/2 rounded mb-2">
        <p class="text-gray-700">{{ $post->caption }}</p>
        <p class="text-sm text-gray-500 mt-2">
            By 
            <a href="{{ route('users.show', $post->user->username) }}" class="text-blue-600 hover:underline">
                {{ $post->user->username }}
            </a>
        </p>
    </article>

    <!-- Comments Section -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Comments</h2>

        @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-4">
                @csrf
                <textarea name="body" rows="2" placeholder="Add a comment..." class="w-full p-2 border rounded mb-2"></textarea>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Post Comment
                </button>
            </form>
        @endauth

        @forelse($post->comments as $comment)
            <div class="border-t border-gray-200 py-2">
                <p class="text-sm font-medium">{{ $comment->user->username }}</p>
                <p class="text-gray-700">{{ $comment->body }}</p>

                @if ($comment->user_id === Auth::id())
                    <div class="mt-1 flex space-x-2 text-sm">
                        <a href="{{ route('comments.edit', $comment) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p class="text-gray-500">No comments yet.</p>
        @endforelse
    </div>

    <a href="{{ route('posts.index') }}" class="text-blue-600 underline">Back to posts</a>
</div>
@endsection