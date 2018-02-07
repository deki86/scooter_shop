@extends('layouts.app')

@section('content')
<div class="col-lg-9">
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
                  <button type="button" class="btn btn-light"><a href="{{ route('parts.show', ['part' => $item->id]) }}">More info...</a></button>
                </div>
              </div>
              @endforeach
          </div><!-- /.row -->
      @endforeach


          <div class="row">
            <div class="col-lg-9">
            {{ $parts->render("pagination::bootstrap-4") }}
            </div>
          </div>
</div><!-- /.col-lg-9 -->
@endsection
