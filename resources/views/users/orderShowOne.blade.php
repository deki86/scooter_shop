@extends('layouts.app')

@section('title')
  User Orders
@endsection

@section('content')
<div class="col-lg-9">

<h2 class="display-4">Your order</h2>
<hr>


<div>
  <p><strong>Order id:</strong>{{ $item->id }}</p>
  <p><strong>Fullname:</strong>{{ $item->fullname }}</p>
  <p><strong>Email:</strong>{{ $item->email }}</p>
  <p><strong>Address:</strong>{{ $item->address}}</p>
  <p><strong>City:</strong>{{ $item->city }}</p>
  <p><strong>Country:</strong>{{ $item->country }}</p>
  <p><strong>Zip:</strong>{{ $item->zip }}</p>
  <p><strong>Payment type:</strong>{{ $item->payment_type }}</p>
  <p><strong>Payment id:</strong>{{ $item->payment_id }}</p>
  <p><strong>Status:</strong>{{ $item->flag }}</p>
  <p><strong>Total price:</strong>{{ $item->total_price }}$</p>


 <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Product id:</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price of product</th>
                </tr>
              </thead>
              <tbody>

@foreach($part['items'] as $it)
                    <tr>
                        <td>{{ $it['item']['id'] }}</td>
                        <td>{{ $it['item']['name'] }}</td>
                        <td>{{ $it['quantity'] }}</td>
                        <td>{{ $it['price'] }}$</td>
                    </tr>
@endforeach
</tbody>
</table>
</div>

</div>

<hr >

</div>
<!-- /.col-lg-9 -->
@endsection
