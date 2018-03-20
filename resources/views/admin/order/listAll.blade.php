@extends('layouts.admin-app')

@section('title')
  Admin Parts List All
@endsection

@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item active">Orders List All</li>
      </ol>

          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Orders Table list</div>
        <div class="card-body">

      @if(count($orders) > 0)
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Full Name</th>

                  <th>Email</th>
                  <th>Total price</th>
                  <th>Status</th>

                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                  @foreach($orders as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td> <strong>{{ $item->fullname }}</strong></td>

                        <td>{{ $item->email }}</td>
                        <td>{{ $item->total_price }}$</td>
                        <td>{{ $item->flag }}</td>


                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('orders.show' , $item->id) }}" class="btn btn-primary" role="button" aria-pressed="true">Show full order</a>
                        </td>
                    </tr>

                  @endforeach

              </tbody>
            </table>


                  {{ $orders->render("pagination::bootstrap-4") }}

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
