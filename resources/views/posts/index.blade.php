@extends('layouts.app')
@section('title') Главная @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="flex justify-center">
                <span class="font-bold text-xl m-4">Learning Blog</span>
            </div>
            <div class="flex-col">
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="mb-5">
                            <hr>
                            <a href="{{ route('posts.show', $post) }}" class="my-3 text-lg font-medium">{{ $post->title }}</a>
                            <p>{{ Str::words($post->content, 35, ' ...') }}</p>
                            <p class="mt-2">Автор: {{ $post->user->username }}</p>
                            <div class="flex mt-3">
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
                        </div>
                    @endforeach
                    <hr>
                    {{ $posts->links() }}
                @else
                    <p>Постов пока что нет <i>:(</i></p>
                @endif
            </div>
        </div>
    </div>
@endsection
