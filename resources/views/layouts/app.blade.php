<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title') - Blog</title>
</head>
<body class="bg-gray-200">
<header>
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Главная</a>
            </li>
            <li>
                <a href="#" class="p-3">Контакты</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @auth()
                <li>
                    <a href="{{ route('admin.index') }}" class="p-3">Админ Панель</a>
                </li>
                <li>
                    <a href="#" class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Выход</button>
                    </form>
                </li>
            @endauth
            @guest()
                <li>
                    <a href="{{ route('login') }}" class="p-3">Войти <i class="fas fa-sign-in-alt"></i></a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Регистрация</a>
                </li>
            @endguest
        </ul>
    </nav>
</header>
@yield('content')
</body>
</html>
