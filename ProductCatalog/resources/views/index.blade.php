<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Script -->
        <script src="{{asset('js/app.js')}}"></script>

        <style>
            body,html{
                height: 100%;
            }
        </style>
    </head>
    <body class="">
        <div class="h-100">
            @yield('content')
        </div>
    </body>
</html>
