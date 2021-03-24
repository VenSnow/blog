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
                <a href="#" class="p-3">Главная</a>
            </li>
            <li>
                <a href="#" class="p-3">Контакты</a>
            </li>
        </ul>
        <ul class="flex items-center">
            <li>
                <a href="#" class="p-3">Админ Панель</a>
            </li>
            <li>
                <a href="#" class="p-3">Имя Юзера</a>
            </li>
            <li>
                <a href="#" class="p-3">Выход</a>
            </li>
        </ul>
    </nav>
</header>
@yield('content')
</body>
</html>
