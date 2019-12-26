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
	<div class="content">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="items">
					<div class="product">
						<div class="row">
							<div class="col-md-3"><img class="img-fluid mx-auto d-block image" src="http://placehold.it/700x400"></div>
							<div class="col-md-8">
								<div class="info">
									<div class="row">
										<div class="col-md-5 product-name">
											<div class="product-name">
												<a href="#">Lorem Ipsum dolor</a>
												<div class="product-info">
													<div>
														Display: <span class="value">5 inch</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4 quantity">
											<label for="quantity">Quantity:</label> <input class="form-control quantity-input" id="quantity" type="number" value="1">
										</div>
										<div class="col-md-3 price">
											<span>$120</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="summary">
					<h3>Summary</h3>
					<div class="summary-item">
						<span class="text">Subtotal</span><span class="price">$360</span>
					</div>
					<div class="summary-item">
						<span class="text">Discount</span><span class="price">$0</span>
					</div>
					<div class="summary-item">
						<span class="text">Shipping</span><span class="price">$0</span>
					</div>
					<div class="summary-item">
						<span class="text">Total</span><span class="price">$360</span>
					</div><button class="btn btn-primary btn-lg btn-block" type="button">Checkout</button>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection