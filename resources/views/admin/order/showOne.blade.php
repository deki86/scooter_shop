@extends('layouts.admin-app')

@section('title')
  Admin Parts List All
@endsection

@section('content')

    @include('admin.inc.nav')


  <div class="content-wrapper">
    <div class="container-fluid">


          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Order </div>
        <div class="card-body">


          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Address</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td> <strong>{{ $order->fullname }}</strong></td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                    </tr>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>City</th>
                  <th>Country</th>
                  <th class="border-right-0">Zip</th>
                  <th class="border border-danger">Flag</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->country }}</td>
                        <td class="border-right-0">{{ $order->zip }}</td>
                        <td class="border border-danger">
                        <form action="{{ route('orders.update', $order->id ) }}" method="POST" class="d-flex">
                          <input type="hidden" name="_method" value="PUT">
                          {{ csrf_field() }}
                        <select id="inputflag" name="flag" class="form-control col-md-6">

                          <option>-- Order Status --</option>
                          <option value="The order is processed" {{ (!$order->isOrderSent()) ? 'selected' : '' }}>The order is processed</option>
                          <option value="The order is sent to your address" {{ ($order->isOrderSent()) ? 'selected' : '' }}>The order is sent to your address</option>



                        </select>
                        <button class="btn btn-info" type="submit">Send Order</button>
                        </form>

                        </td>
                    </tr>
              </tbody>
            </table>
          </div>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Payment type</th>
                  <th>Payment id</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $order->payment_id }}</td>
                        <td>{{ $order->created_at->diffForHumans()}}</td>
                        <td>{{ $order->updated_at->diffForHumans() }}</td>
                    </tr>
              </tbody>
            </table>
          </div>


        <h2>Parts:</h2>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Part id</th>
                  <th>Part name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach($parts['items'] as $item)
                    <tr>
                        <td>{{ $item['item']['id'] }}</td>
                        <td><a href="{{ route('parts.show', ['part' => $item['item']['id']]) }}">{{ $item['item']['name'] }}</a></td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }}$</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>


      <div class="float-right mb-2"><strong class="float-right">Price total: {{ $parts['priceTotal'] }}$</strong></div>

      <hr class="mb-2">

        <div class="card-footer small text-muted">Updated   {{$order->updated_at->diffForHumans()}}

          </div>


      </div>
    </div>





        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.content-wrapper-->
  @include('admin.inc.footer')

@endsection
