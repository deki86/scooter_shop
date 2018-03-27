@extends('layouts.app')

@section('title')
  Home
@endsection

@section('content')
<div class="col-lg-9">

<h2 class="display-4">Welcome to user profile</h2>

<p>Your name is: <strong>{{ Auth::user()->name }}</strong></p>
<p>Your lastname is: <strong>{{ Auth::user()->lastname }}</strong></p>
<p>Your address is: <strong>{{ Auth::user()->address }}</strong></p>
<p>Your city is: <strong>{{ Auth::user()->city }}</strong></p>
<p>Your country is: <strong>{{ Auth::user()->country }}</strong></p>
<p>Your email is: <strong>{{ Auth::user()->email }}</strong></p>

<hr>
<div class="clearfix">
  <p class="text-center h2">
    <a href="{{ route('users.resetpass') }}"><i class="fa fa-key"></i>Change Password</a> |
    <a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-edit"></i>Edit Profile</a> |
    <a href="{{ route('users.orders.index', Auth::user()->id ) }}"><i class="fa fa-cart-plus"></i>View your orders!</a>
  </p>
</div>
<hr >

</div>
<!-- /.col-lg-9 -->
@endsection
