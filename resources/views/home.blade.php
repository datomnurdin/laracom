@extends('layouts.app')

@section('content')

<div class="col-lg-3">
  <h1 class="my-4">Laracom</h1>
  <div class="list-group">
    <a href="#" class="list-group-item">Category 1</a>
    <a href="#" class="list-group-item">Category 2</a>
    <a href="#" class="list-group-item">Category 3</a>
  </div>
</div>
<div class="col-lg-9">
  <div class="row my-4" >
    @foreach ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="/product/{{$product->slug}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="/product/{{$product->slug}}">{{ $product->name }}</a>
            </h4>
            <h5>{{ $product->price_format() }}</h5>
            <p class="card-text">{{ $product->description }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
