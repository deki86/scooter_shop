<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Custom styles for this template -->
<!--     <link href="css/shop-homepage.css" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>

  <body>

    @include('includes.nav')


    <!-- Page Content -->
    <div class="container mt-4">

      <div class="row">

        <div class="col-lg-3">

          @if(!in_array(\Request::route()->getName(), ['register', 'login', 'about', 'contact', 'password.request', 'password.reset']))
             @include('includes.sidebar')
          @endif



        </div>
        <!-- /.col-lg-3 -->


      @yield('content')






      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

  </body>

</html>
