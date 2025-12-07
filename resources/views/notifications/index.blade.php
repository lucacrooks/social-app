@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Notifications</h1>

    @forelse ($notifications as $notification)
        <div class="border-b border-gray-200 py-3">
            <div class="flex justify-between items-center">
                <p class="{{ $notification->read_at ? 'text-gray-500' : 'text-gray-900 font-semibold' }}">
                    {{ $notification->data['commenter'] }} commented on your post:
                    “{{ Str::limit($notification->data['comment_body'], 50) }}”
                </p>
                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                    @csrf
                    <button class="text-blue-600 text-sm">Mark as read</button>
                    <a href="{{ route('posts.show', $notification->data['post_id']) }}" class="text-blue-600 underline">
                        View Post
                    </a>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No notifications yet.</p>
    @endforelse
</div>
@endsection