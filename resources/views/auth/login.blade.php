@extends('layouts.app')
@section('title') Вход @endsection
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded lg">
            <p class="flex justify-center mb-4 text-xl font-medium w-full">Вход</p>
            @if(session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-4">
                    <label for="username" class="sr-only">Логин</label>
                    <input type="text" name="username" id="username" placeholder="Логин" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Пароль</label>
                    <input type="password" name="password" id="password" placeholder="Пароль" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Запомнить меня</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Войти
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
