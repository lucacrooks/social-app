<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{

    public function store(Request $request, \App\Models\Post $post)
    {
    $validated = $request->validate([
        'body' => 'required|string|max:1000',
    ]);

    $comment = $post->comments()->create([
        'body' => $validated['body'],
        'user_id' => auth()->id(),
    ]);

    // Notify the post author (if not self-commenting)
    if ($post->user_id !== auth()->id()) {
        $post->user->notify(new CommentNotification($comment));
    }

    return redirect()->route('posts.show', $post)->with('success', 'Comment added!');
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validated = $request->validate([
            'body' => 'required|string|max:500',
        ]);

        $comment->update($validated);

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment updated!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted!');
    }
}
