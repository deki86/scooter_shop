
@extends('layouts.app')

@section('title')
  Checkout Stripe
@endsection

@section('content')
<div class="col-6 offset-col-3">
       @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
      <h2>Payment form via Stripe:</h2>
      <hr>

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('proccess.stripe') }}" method="POST" id="payment-form" class="pb-2">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="fullname">Full name:</label>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Jon Doe"
           value="{{ Auth::user()->name}} {{Auth::user()->lastname  }}" >
        </div>

         <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email"
               placeholder="example@example.com"  value="{{ Auth::user()->email}}">
            </div>
            <div class="col">
              <label for="telephone">Telephone:</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="06*******">
            </div>
          </div>
        </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country"
                 placeholder="Zimbabwe"  value="{{ Auth::user()->country}} ">
              </div>

              <div class="col">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city"
                 placeholder="Harare" value="{{ Auth::user()->city}} ">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col">
                <label for="street">Street address:</label>
                <input type="text" class="form-control" id="street" name="address"
                 placeholder="1234 Main St" value="{{ Auth::user()->address}} ">
              </div>

              <div class="col">
                <label for="zip">Zip code:</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="123456">
              </div>

            </div>
            <input name="payment_type" type="hidden" value="stripe">
            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
          </div>

          <div class="form-group">

              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>

          </div>

          <div class="form-group">
            <p class="p-2"><strong>*All fields are required. You can change transport address or city... </strong></p>
          </div>

              <button class="btn btn-success">Submit Payment</button>
      </form>



</div><!-- /.col-lg-12 -->

@endsection

@section('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script src="{{ asset('js/stripe-checkout.js') }}"></script>
@endsection
