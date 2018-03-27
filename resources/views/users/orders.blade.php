@extends('layouts.app')

@section('title')
  User Orders
@endsection

@section('content')
<div class="col-lg-9">

<h2 class="display-4">Your orders</h2>
<hr>
@if(count($orders) > 0)


	 <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Flag</th>
                  <th>Total price</th>
				<th></th>
                </tr>
              </thead>
              <tbody>

	@foreach($orders as $order)


	<tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->fullname }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->flag }}</td>
		<td>{{ $order->total_price }}$</td>
		<td>
			 <a href="{{ route('users.orders.show' ,[ Auth::user()->id, $order->id ]) }}" class="btn btn-primary" role="button" aria-pressed="true">Show full order</a>
		</td>
    </tr>


	@endforeach
	        </tbody>
         </table>
@else
	<div class="alert alert-warning" role="alert">
  		<strong>Warning!</strong> You don't have any order yet!      {{ $order->flag }}
	</div>
@endif

</div>

<hr >

</div>
<!-- /.col-lg-9 -->
@endsection
