@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">Create a New Post</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Upload Image
            </label>
            <input
                type="file"
                name="image"
                accept="image/*"
                class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100"
                required
            >
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Caption
            </label>
            <textarea
                name="caption"
                rows="3"
                placeholder="Write something inspiring..."
                class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100"
            ></textarea>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition"
        >
            Post
        </button>
    </form>
</div>
@endsection