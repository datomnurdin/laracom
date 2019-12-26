@extends('layouts.app')

@section('content')

<div class="shopping-cart">
	<div class="block-heading">
		<h1>Cart</h1>

		@if(session()->has('success'))
			<div class="alert alert-success">
				{{session()->get('success')}}
			</div>
		@endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

	</div>

	@if (Cart::count() > 0)
		
	<div class="content">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="items">

					@foreach (Cart::content() as $item)
						
					<div class="product">
						<div class="row">
							<div class="col-md-3"><img class="img-fluid mx-auto d-block image" src="http://placehold.it/700x400"></div>
							<div class="col-md-8">
								<div class="info">
									<div class="row">
										<div class="col-md-4 product-name">
											<div class="product-name">
												<a href="/product/{{$item->model->slug}}">{{$item->model->name }}</a>
												<div class="product-info">
													<div>
														{{$item->model->description }}
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<form action="/cart/{{$item->rowId}}" method="POST">
												{{csrf_field()}}
												{{method_field('DELETE')}}
												<button class="btn btn-danger">Remove</button>
											</form>
											<form action="/cart/saveForLater/{{$item->rowId}}" method="POST">
												{{csrf_field()}}
												<button class="btn btn-primary">Save For Later</button>
											</form>
										</div>
										<div class="col-md-2 quantity">
											<label for="quantity">Quantity:</label> <input class="form-control quantity-input" id="quantity" type="number" value="{{$item->qty }}">
										</div>
										<div class="col-md-1 price">
											<span>{{$item->model->price_format() }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@endforeach
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="summary">
					<h3>Summary</h3>
					<div class="summary-item">
						<span class="text">Subtotal</span><span class="price">{{price_format(Cart::subtotal())}}</span>
					</div>
					<div class="summary-item">
						<span class="text">Tax</span><span class="price">{{price_format(Cart::tax())}}</span>
					</div>
					<div class="summary-item">
						<span class="text">Total</span><span class="price">{{price_format(Cart::total())}}</span>
					</div><a href="/checkout" class="btn btn-primary btn-lg btn-block" type="button">Checkout</a>
				</div>
			</div>
		</div>
	</div>

	@else

	<h3>No items in Cart!</h3>
		
	@endif

	<h1>Save For Later</h1>

	@if (Cart::instance('saveForLater')->count() > 0)
		
	<div class="content">
		<div class="row">
			<div class="col-md-8 col-lg-8">
				<div class="items">

					@foreach (Cart::instance('saveForLater')->content() as $item)
						
					<div class="product">
						<div class="row">
							<div class="col-md-3"><img class="img-fluid mx-auto d-block image" src="http://placehold.it/700x400"></div>
							<div class="col-md-8">
								<div class="info">
									<div class="row">
										<div class="col-md-4 product-name">
											<div class="product-name">
												<a href="/product/{{$item->model->slug}}">{{$item->model->name }}</a>
												<div class="product-info">
													<div>
														{{$item->model->description }}
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<form action="/saveForLater/{{$item->rowId}}" method="POST">
												{{csrf_field()}}
												{{method_field('DELETE')}}
												<button class="btn btn-danger">Remove</button>
											</form>
											<form action="/saveForLater/moveToCart/{{$item->rowId}}" method="POST">
												{{csrf_field()}}
												<button class="btn btn-primary">Move To Cart</button>
											</form>
										</div>
										<div class="col-md-2 quantity">
											<label for="quantity">Quantity:</label> <input class="form-control quantity-input" id="quantity" type="number" value="{{$item->qty }}">
										</div>
										<div class="col-md-1 price">
											<span>{{$item->model->price_format() }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					@endforeach
				</div>
			</div>
		</div>
	</div>

	@else

	<h3>You have no items Saved For Later.</h3>
		
	@endif
</div>

@endsection