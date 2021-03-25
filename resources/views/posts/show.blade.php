@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded lg">
            <p class="flex justify-center mb-4 text-xl font-medium w-full">{{ $post->title }}</p>
            <hr>
            <div class="mb-4">
                Автор: <b class="mr-3">{{ $post->user->username }}</b> Создан:<span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <p class="mb-2">
                {{ $post->content }}
            </p>
            <hr class="mb-2">
            @auth
                @if(auth()->user()->isAdmin())
                    <form action="" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="mt-2 px-4 py-2 rounded bg-red-500 text-white font-medium">Удалить</button>
                    </form>
                @endif
            @endauth

            <div class="flex items-center mt-5 mb-5">
                @auth
                    @if(!$post->likedBy(auth()->user()))
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
                            @csrf
                            <button type="submit"><i class="far fa-heart"></i> {{ $post->likes->count() }}</button>
                        </form>
                        <p class="mr-3"><i class="far fa-comment-alt"></i> {{ $post->comments->count() }}</p>
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class="fas fa-heart text-red-500"></i> {{ $post->likes->count() }}</button>
                        </form>
                        <p class="mr-3"><i class="far fa-comment-alt"></i> {{ $post->comments->count() }}</p>
                    @endif
                @endauth
                @guest
                    <p class="mr-3"><i class="far fa-heart"></i> {{ $post->likes->count() }}</p>
                    <p class="mr-3"><i class="far fa-comment-alt"></i> {{ $post->comments->count() }}</p>
                @endguest
            </div>
            <div class="flex items-center mt-5 mb-5">

            </div>
        </div>
    </div>
@endsection
