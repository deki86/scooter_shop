@extends('layouts.app')

@section('title')
  Home
@endsection

@section('content')
<div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="{{ asset('img/image-slider-1.jpg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/image-slider-2.jpg') }}" alt="Second slide">
              </div>

              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/image-slider-3.jpg') }}" alt="Third slide">
              </div>
               <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/image-slider-4.jpg') }}" alt="Fourth slide">
              </div>
               <div class="carousel-item">
                <img class="d-block img-fluid" src="{{ asset('img/image-slider-5.jpg') }}" alt="Fifth slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

    @foreach(array_chunk($parts->all(), 3) as $row)
      <div class="row">
            @foreach($row as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <a href="{{ route('parts.show', ['part' => $item->id]) }}"><img class="card-img-top" src="{{ $item->image }}" alt=""></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="{{ route('parts.show', ['part' => $item->id]) }}">{{ $item->name }}</a>
                      </h4>
                      <h5>Price: <span class="badge badge-info">{{ $item->price }}$ </span></h5>
                      <p class="card-text"><span>Description:</span> {{ str_limit($item->description, 40) }}</p>


                    </div>
                    <button type="button" class="btn btn-dark"><a href="{{ route('parts.show', ['part' => $item->id]) }}">More info...</a></button>
                  </div>
                </div>
            @endforeach
          </div><!-- /.row -->
    @endforeach
</div>
<!-- /.col-lg-9 -->
@endsection
