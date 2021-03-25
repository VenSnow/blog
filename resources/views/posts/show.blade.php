@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded lg">
            <p class="flex justify-center mb-4 text-2xl font-medium w-full">{{ $post->title }}</p>
            <hr>
            <div class="mb-4">
                Автор: <b class="mr-3">{{ $post->user->username }}</b> Создан: <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
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
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class="fas fa-heart text-red-500"></i> {{ $post->likes->count() }}</button>
                        </form>
                    @endif
                @endauth
                @guest
                    <p class="mr-3"><i class="far fa-heart"></i> {{ $post->likes->count() }}</p>
                @endguest
            </div>
            <div class="flex-wrap items-center mt-5 mb-5">
                @auth
                    <p class="font-medium text-lg">Добавить комментарий</p>
                    <div class="py-3 mb-3">
                        <form action="{{ route('posts.comments', $post) }}" method="post">
                            @csrf
                            <div class="flex-wrap mb-4">
                                <label for="body" class="sr-only">Текст</label>
                                <textarea class="bg-gray-100 border-2 w-full p-4 rounded lg @error('body') border-red-500 @enderror" name="body" id="body" rows="5" placeholder="Текст комментария"></textarea>

                                @error('body')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-3 rounded font-medium">Отправить</button>
                            </div>
                        </form>
                    </div>
                @endauth
                @guest
                    <p class="font-medium text-lg my-5">Войдите на сайт чтобы добавить комментарий</p>
                @endguest
                @if($post->comments->count())
                    <i class="far fa-comment-alt"></i> Комментариев: {{ $post->comments->count() }}
                    <hr class="my-3">
                    @foreach($comments as $comment)
                        <div class="mb-5">
                            <p>От: <b class="mr-3">{{ $comment->user->username }}</b> Дата: <span class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</span></p>
                            <p class="mt-3">
                                {{ $comment->body }}
                            </p>
                        </div>
                        <hr class="my-3">
                    @endforeach
                    {{ $comments->links() }}
                @else
                    <div class="my-3 py-3">
                        <i class="far fa-comment-alt mb-3"></i> Комментариев: {{ $post->comments->count() }}
                        <p class="mt-3">Комментариев пока нет <i>:(</i></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
