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
    <link href="{{ asset('dashboard/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('dashboard/js/lumino.glyphs.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('js/admin/html5shiv.js') }}"></script>
    <script src="{{ asset('js/admin/respond.min.js') }}"></script>
    <![endif]-->


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.home') }}"><span>PAmetna konferencija</span> Admin</a>


                <ul class="user-menu">
                    <li class="dropdown pull-right">

                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>  <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <!--
                            <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                            -->

                             <li>
                                <a href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li role="presentation" class="divider"></li>

            <li {{ (Request::is('admin/') ? 'class=active' : '') }} ><a href="{{ route('admin.home') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            <li>
                        <a class="" href="">
                            <svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Svi gosti
                        </a>
            </li>
             <li>
                        <a class="" href="">
                            <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg>Učsnici na radionici
                        </a>
            </li>




            <li role="presentation" class="divider"></li>

        </ul>

    </div><!--/.sidebar-->


        @yield('content')


    <!-- Scripts -->
    <script src="{{ asset('dashboard/js/app.js') }}"></script>
    <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>

</body>
</html>
