@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" class="w-full p-2 border rounded mb-4">
        <textarea name="body" rows="6" class="w-full p-2 border rounded mb-4">{{ $post->body }}</textarea>
        <button class="px-4 py-2 bg-green-500 text-white rounded">Update</button>
    </form>
</div>
@endsection