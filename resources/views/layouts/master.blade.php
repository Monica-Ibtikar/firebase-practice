<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Firebase Practice') }}</title>

    <!-- Styles -->
    <script src="{{asset('js/jquery-slim.min.js')}}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</head>
<body>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">Manage Users</a>
    </li>
</ul>
@yield('content')

</body>

</html>