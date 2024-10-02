<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Интренет каталог</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Script -->
        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body class="">
        <div class="container">
            <ul class="nav nav-pills my-3">
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('items.form') ? 'active' : '' }}" aria-current="page" href="{{ route('items.form') }}">Список продукции</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('items.orders') ? 'active' : '' }}" href="{{ route('items.orders') }}">История заказов</a>
                </li>
            </ul>
        </div>
        <div class="h-100">
            @yield('content')
        </div>
    </body>
</html>
