<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel')  }} - @yield('title')</title>


    <!-- Styles -->
    <link href="{{ asset('admin/css/admin-app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
    @if(in_array(\Request::route()->getName(), ['admin.login', 'admin.register', 'admin.password.request']))
        <body class="bg-dark">
    @else
        <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    @endif


        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('admin/js/app.js') }}"></script>
    @yield('scripts')


</body>
</html>
