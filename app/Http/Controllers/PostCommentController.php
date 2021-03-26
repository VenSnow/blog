<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
           'body' => 'required|min:10',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => $request->body,
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        if(!auth()->user()->isAdmin()) {
            return response(null,  409);
        }

        $comment->delete();

        return back();
    }
}
