@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-2xl shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Comment</h1>

    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Comment</label>
            <textarea
                name="body"
                id="body"
                rows="4"
                class="w-full border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                required
            >{{ old('body', $comment->body) }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition"
            >
                Update Comment
            </button>

            @php
                // route back to the parent post show page
                $postRoute = route('posts.show', $comment->post_id);
            @endphp

            <a href="{{ $postRoute }}" class="text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection