<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Авторизацтя</title>

    <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Вход</h1>

        <form class="space-y-5 mt-5" action="login_act" method="post">
            @csrf
            <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
            <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />

            <div>
                <a href="{{ route("register")  }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
            </div>
            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Войти</button>
        </form>
    </div>
</div>
</body>
</html>
