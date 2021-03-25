<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('user')->latest()->paginate(15);
        return view('posts.index', [
           'posts' => $posts
        ]);
    }
}