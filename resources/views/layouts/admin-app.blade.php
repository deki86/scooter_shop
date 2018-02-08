<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


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
        <body>
    @endif


        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('admin/js/app.js') }}"></script>


    <script src="{{ asset('admin/js/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/sb-admin-charts.min.js') }}"></script>

</body>
</html>
