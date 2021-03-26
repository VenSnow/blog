<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user', 'likes', 'comments')->latest()->paginate(15);
        return view('posts.index', [
           'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->paginate(20);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function destroy(Post $post)
    {
        if(!auth()->user()->isAdmin())
        {
            return response(null, 409);
        }

        $post->delete();

        return redirect(route('home'));
    }
}
