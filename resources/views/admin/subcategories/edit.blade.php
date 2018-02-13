@extends('layouts.admin-app')

@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('subcategories.index')}}">Sub Categories</a>
        </li>
        <li class="breadcrumb-item active">Edit Subcategories</li>
      </ol>

       <form class="form-horizontal" role="form" method="POST" action="{{ route('subcategories.update', $subcategory->id) }}">
        <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('categoryName') ? ' has-error' : '' }}">
                <label for="exampleInputcategoryName">Category Name</label>
                <input id="categoryName" type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required >
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
              <div class="form-row">
                <label for="category">Chose a category:</label>
              </div>

                  <select id="inputcategory" name="categories_id" class="form-control col-md-6 {{ $errors->has('categories_id') ? ' has-error' : '' }}">
                    <option>Select a category name</option>
                      @foreach($category as $item)
                        <option  value="{{ $item->id }}" {{ ($subcategory->categories->id == $item->id) ? 'selected' : '' }}> {{ $item->name }}</option>
                      @endforeach
                  </select>


          </div>
                        @if ($errors->has('categories_id'))
                <div class="form-group">
                  <span class="alert alert-danger">
                      <strong>{{ $errors->first('categories_id') }}</strong>
                  </span>
                </div>
              @endif

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>


        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.content-wrapper-->
  @include('admin.inc.footer')

@endsection
