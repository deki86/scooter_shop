@extends('layouts.admin-app')

@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('parts.index')}}">Parts</a>
        </li>
        <li class="breadcrumb-item active">Create New Part</li>
      </ol>

       <form class="form-horizontal" role="form" method="POST" action="{{ route('parts.store') }}" enctype="multipart/form-data">
         {{ csrf_field() }}


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="partName">Part Name</label>
                <input id="partName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " name="name" value="{{ old('name') }}" required>

                @if($errors->has('name'))
                  <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                @endif
              </div>

              <div class="col-md-6">
                <label for="subcategories">Select Subcategory</label>
                    <select id="inputcategory" name="subcategories_id" class="form-control {{ $errors->has('subcategories_id') ? ' is-invalid' : '' }}">
                    <option>--  Select  --</option>
                      @foreach($sub as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                @if($errors->has('subcategories_id'))
                  <div class="form-control-feedback">{{ $errors->first('subcategories_id') }}</div>
                @endif

              </div>

            </div>

          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="status">Select Status</label>
                    <select id="status" name="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                    <option>--  Select  --</option>

                    <option value="unavailable">Unavailable</option>
                    <option value="available">Available</option>

                  </select>
                @if($errors->has('status'))
                  <div class="form-control-feedback">{{ $errors->first('status') }}</div>
                @endif

              </div>

              <div class="col-md-6">
                <label for="quantity">Quantity</label>
                  <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }} " name="quantity" value="{{ old('quantity') }}" required>

                @if($errors->has('quantity'))
                  <div class="form-control-feedback">{{ $errors->first('quantity') }}</div>
                @endif
              </div>

            </div>

          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="brand">Select Brand</label>
                    <select id="brand" name="brand_id" class="form-control {{ $errors->has('brand_id') ? ' is-invalid' : '' }}">
                    <option>--  Select  --</option>
                      @foreach($brands as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                @if($errors->has('brand_id'))
                  <div class="form-control-feedback">{{ $errors->first('brand_id') }}</div>
                @endif

              </div>

              <div class="col-md-6">
                <label for="manufacturers">Select Manufacturer</label>
                    <select id="manufacturers" name="manufacturer_id" class="form-control {{ $errors->has('manufacturer_id') ? ' is-invalid' : '' }}">
                    <option>--  Select  --</option>
                      @foreach($manufacturers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                  </select>
                @if($errors->has('manufacturer_id'))
                  <div class="form-control-feedback">{{ $errors->first('manufacturer_id') }}</div>
                @endif

              </div>

            </div>

          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="price">Price</label>
                <div class="input-group">
                  <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} " name="price" value="{{ old('price') }}" required>
                  <div class="input-group-append">
                      <span class="input-group-text">$</span>
                  </div>
                </div>

                @if($errors->has('price'))
                  <div class="form-control-feedback">{{ $errors->first('price') }}</div>
                @endif
              </div>


            </div>

          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} " id="description" name="description"  rows="5" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                  <div class="form-control-feedback">{{ $errors->first('description') }}</div>
                @endif
         </div>


            <div class="form-group">
              <label for="image">Example file input</label>
              <input type="file" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }} " name="image" id="image">
              @if($errors->has('image'))
                  <div class="form-control-feedback">{{ $errors->first('image') }}</div>
                @endif
            </div>




              <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-4 ">Create a New Part</button>
            </div>
        </form>



        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.content-wrapper-->
  @include('admin.inc.footer')

@endsection
