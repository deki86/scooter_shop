@extends('layouts.admin-app')

@section('title')
  Admin Login Page
@endsection

@section('content')

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             <label for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Admin Login
                                </button>

                    </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('admin.register') }}">Register Admin an Account</a>
          <a class="d-block small" href="{{ route('admin.password.request') }}">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

@endsection
