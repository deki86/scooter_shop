@extends('layouts.admin-app')

@section('title')
  Admin Categories List All
@endsection
@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Categories List All</li>
      </ol>

          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Categories Table list</div>
        <div class="card-body">

      @if(count($partCategory) > 0)
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                  @foreach($partCategory as $category)

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td> <strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>

                           <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button class="btn btn-danger btn-xs">
                                <span>DELETE</span>
                              </button>
                            </form>
                        </td>


                    </tr>

                  @endforeach

              </tbody>
            </table>


                  {{ $partCategory->render("pagination::bootstrap-4") }}

        @else
          <p class="alert alert-info">We don't have any records in our database!</p>

        @endif
          </div>
        </div>


        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>




        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.content-wrapper-->
  @include('admin.inc.footer')

@endsection
