@extends('layouts.admin-app')

@section('title')
  Admin Brand Create New
@endsection

@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('brands.index')}}">Brands</a>
        </li>
        <li class="breadcrumb-item active">Create New Brand</li>
      </ol>

       <form class="form-horizontal" role="form" method="POST" action="{{ route('brands.store') }}">
         {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="exampleInputbrandName">Brand Name</label>
                <input id="brandName" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
              </div>
            </div>


          </div>
              @if ($errors->has('name'))
                <div class="form-group">
                  <span class="alert alert-danger">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                </div>
              @endif

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>


        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.content-wrapper-->
  @include('admin.inc.footer')

@endsection
