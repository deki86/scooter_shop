
@extends('layouts.app')

@section('title')
  Shopping Cart
@endsection

@section('content')
<div class="col-lg-9">
    <div class="row">

        @if(Session::has('cart'))
                <h2 class="pl-3 pt-5">Shopping Cart</h2>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Name of part</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($cart->items as $part)
                            <tr>
                                <td>{{ $part['item']['name'] }}</td>
                                <td>
                                    <form class="form-inline d-inline" role="form" method="POST" action="{{ route('parts.addToCart2', ['part' => $part['item']['id']]) }}">
                                    {{ csrf_field() }}
                                    <span class="badge badge-info">{{ $part['quantity'] }}</span>
                                    <button type="submit" class="btn btn-primary btn-sm">Add one more </button>
                                    </form>

                                    @if($part['quantity'] > 1)
                                        <form class="form-inline d-inline" role="form" method="POST" action="{{ route('parts.deleteItem', ['part' => $part['item']['id']]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete one item </button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{$part['price']}} $</td>
                                                        <td>
                            <form method="POST" action="{{ route('parts.deleteRowItems', ['part' => $part['item']] ) }}" style="display:inline-block">
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
                    </div>
                </div>

            <hr class="dropdown-divider w-100" />
            <div class="col-12">
                <strong class="float-right">Total price : {{ $cart->priceTotal }} $</strong>
            </div>


            <div class="col-12">
               <p class="float-right">Total quantity  :  <strong class="float-right">{{ $cart->quantityTotal }} </strong></p>
            </div>
             <hr class="dropdown-divider w-100" />
                        <div class="col-12 float-right">
                            <form action="" method="POST" class=" d-inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Checkout</button>
                            </form>


                            <form method="POST" action="{{ route('parts.emptyCart') }}" class="d-inline">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger ">
                                <span>Empty Cart!</span>
                              </button>
                            </form>
                        </div>
        @else
            <div class="col-12">
                <h3 class="alert alert-info">Shooping Cart is Empty!</h3>
            </div>
        @endif

    </div>
</div><!-- /.col-lg-9 -->

@endsection
