@extends('layouts.admin-app')

@section('content')
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Admin Account</div>
      <div class="card-body">
         <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.register') }}">
         {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="exampleInputName">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="col-md-6{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="exampleInputLastName">Last name</label>
                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Email address</label>
             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group">
            <div class="form-row ">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="col-md-6">
                 <label for="password-confirm" class="control-label">Confirm Password</label>
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-primary btn-block">ADMIN Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('admin.login') }}">Admin Login Page</a>
          <a class="d-block small" href="{{ route('admin.password.request') }}">Admin Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
@endsection
