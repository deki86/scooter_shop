@extends('layouts.admin-app')

@section('content')
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Reset Password</div>
      <div class="card-body">
                 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Enter email address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('admin.register') }}">Register Admin an Account</a>
          <a class="d-block small" href="{{ route('admin.login') }}">Admin Login Page</a>
        </div>
      </div>
    </div>
  </div>
@endsection
