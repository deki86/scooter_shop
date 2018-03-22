@extends('layouts.app')

@section('title')
  Home
@endsection

@section('content')
<div class="col-lg-9">

<h2 class="display-4">Change password</h2>
<hr>
    <div class="panel-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <form class="form-horizontal" method="POST" action="{{ route('users.changepassword') }}">

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
            <label for="passwordold" class="col-md-4 control-label">Password old</label>

            <div class="col-md-6">
                <input id="passwordold" type="password" class="form-control" name="passwordold" required>
                    @if ($errors->has('passwordold'))
                        <span class="help-block">
                            <strong>{{ $errors->first('passwordold') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password new</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change
                                </button>
                            </div>
                        </div>

        </form>
    </div>




<hr>

</div>
<!-- /.col-lg-9 -->
@endsection
