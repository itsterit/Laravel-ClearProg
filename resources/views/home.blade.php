<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<div class="container mt-5">
    @php
        use App\Models\User;
        $UsersData = User::all();
        $GET_local_user = $_GET['User'] ?? "";
    @endphp

    @if(session('UserName', '-') != '-')
        <a href="{{ route("EndSession") }}">выйти</a>
        <h1 class="text-success">
            Hi, {{ session('UserName', '-') }}!
        </h1>
    @else
        <a href="{{ route("login") }}">Войти</a>
    @endif

    @if((isset($UsersData)) && (session('UserName', '-') != '-'))
        @if(count($UsersData))
            <div class="mb-5">
                <form method="get" action="/StoreDataHandler" id="user_config">

                    <!-- Пользователи -->
                    <select class="form-control mb-2" name="User" onchange="document.getElementById('user_config').submit()">
                            <option  value="-1" selected>Пользователь неопределен</option>
                            @foreach($UsersData as $User)
                                @if($GET_local_user == $User->name)
                                    <option value="{{ $User->name }}" selected>{{ $User->name }}</option>
                                @else
                                    <option value="{{ $User->name }}">{{ $User->name }}</option>
                                @endif
                            @endforeach
                    </select>

                    <input name="order_name" type="text" class="form-control mb-3" placeholder="Name" />
                    <input name="order_price" type="number" class="form-control mb-3" placeholder="цена" />
                    <button name="IsGoStoreView" value="1" type="submit" class="btn btn-dark">Установить</button>

                </form>
            </div>
        @endif
    @endif

</div>
