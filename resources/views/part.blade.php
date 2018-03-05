@extends('layouts.app')

@section('title')
  {{$part->name}}
@endsection

@section('content')
<div class="col-lg-6">
    <div class="row">
        <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="/images/{{ $part->image }}" alt=""></a>
                  <div class="card-body">
                    <h3 class="card-title">
                      <a href="#">{{ $part->name }}</a>
                    </h3>
                    <h5>Price: <span class="badge badge-info">{{ $part->price }}$ </span></h5>
                    <p class="card-text"><span>Description:</span> {{ $part->description }}</p>
                    <h5><strong>Manufacturer: </strong>{{ $part->manufacturer->name }}</h5>
                    <h5>Brand: {{ $part->brand->name}} </h5>

                    @if($part->isAvailable())
                        <h5>Number of parts in stock: {{ $part->quantity }}</h5>
                    @else
                        <h5>Status: {{ $part->status }}</h5>
                    @endif


                  </div>
                  <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary float-right">
                      <a href="{{ route('parts.addToCart', ['part'=> $part->id ]) }}">Add to cart</a>
                    </button>
                  </div>
        </div>
    </div>
</div><!-- /.col-lg-6 -->

<!-- Right sidebar Brand, Manufacturers and polls, search parts -->
<div class="col-lg-3">
      <!-- Brands list -->
      <ul class="list-group d-block mt-3">

        <li class="list-group-item pl-0" data-toggle="tooltip" data-placement="right" title="cart">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecart" data-parent="#examplecart">

                <span class="nav-link-text"><i class="fa fa-folder fa-2x float-left" aria-hidden="true"></i> <h4 class="pl-5 pt-1">  Brands</h4></span>
              </a>

            <ul class="sidenav-second-level collapse" id="collapsecart">
            @foreach($brands as $brand)
            <li class="list-group">
                      <a  href="{{ route('brand.parts.index', ['brand'=> $brand->id ]) }}">{{ $brand->name }}</a>
                  </li>

            @endforeach
                </ul>

      </ul>

<!-- Manufacturers list -->
      <ul class="list-group d-block mt-3">

        <li class="list-group-item pl-0" data-toggle="tooltip" data-placement="right" title="cart">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecart" data-parent="#examplecart">

                <span class="nav-link-text"><i class="fa fa-motorcycle fa-2x float-left" aria-hidden="true"></i> <h4 class="pl-5 pt-1">  Manufacturers</h4></span>
              </a>

            <ul class="sidenav-second-level collapse" id="collapsecart">
            @foreach($manufacturers as $manufacturer)
            <li class="list-group">
                      <a  href="{{ route('manufacturer.parts.index', ['manufacturer'=> $manufacturer->id ]) }}">{{ $manufacturer->name }}</a>
                  </li>

            @endforeach
                </ul>

      </ul>

</div><!-- /.col-lg-3 -->
@endsection
