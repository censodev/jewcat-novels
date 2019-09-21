@extends('layouts.frontend-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/cart.css') }}">
@endpush

@section('content')
<div id="cart-section">
	@if(Cart::count() > 0)
	<div class="row cart-container">
		<div class="col-8 cart-list">
			@foreach($itemList as $cartItem)
			<div class="row cart-item" data-novel-id="{{ $cartItem->id }}">
				<div class="shadow-mask"></div>
				<div class="cart-item-info col-12">
					<div class="row">
						<div class="col-4">
							<img src="{{ asset('images/novels/'.$cartItem->novel_image_url) }}">
						</div>
						<div class="col-8 p-2 cart-item-content">
							<h4>{{ $cartItem->novel_name }}</h4>
							<p class="mb-2">Số lượng còn lại: {{ $cartItem->novel_quantity }}</p>
							<p>
								<span class="price mb-0"><span class="price-mask">{{ $cartItem->now_price }}</span><small> ₫</small></span>
								@if($cartItem->novel_sale_off > 0)
								<strike><span class="price-mask ml-3">{{ $cartItem->novel_price }}</span> ₫</strike>&nbsp;&nbsp;| -{{ $cartItem->novel_sale_off }}% 
								@endif
							</p>
							
							<div class="col-12 mt-5 d-flex justify-content-end">
								<button class="btn btn-success insBtn" data-novel-id="{{ $cartItem->id }}"><i class="fas fa-caret-up"></i></button>
								<input class="form-control ml-1 text-center displayQty" type="number" name="" value="{{ $cartItem->qty }}" data-novel-id="{{ $cartItem->id }}" disabled>
								<button class="btn btn-primary ml-1 desBtn" data-novel-id="{{ $cartItem->id }}"><i class="fas fa-caret-down"></i></button>
								<button class="btn btn-danger ml-1 rmvBtn" data-novel-id="{{ $cartItem->id }}"><i class="fas fa-trash-alt"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="col-4 p-3">
			{{-- <div class="shadow-mask"></div> --}}
			<div class="bill">
				<div class="col-12 d-flex justify-content-between">
					<h5>Thành tiền:</h5>
					<span>
						<span class="txtSubtotal">{{ Cart::subtotal(false, '', '.') }}</span>
						<small>₫</small>
					</span>
				</div>
				<div class="col-12 d-flex justify-content-between">
					<h5>Phí vận chuyển:</h5>
					<span>
						<span class="price-mask txtTransFee">{{ Session::get('transportFee') }}</span>
						<small>₫</small>
					</span>
				</div>

				<div class="col-12"><hr style="border-top: 1px solid #FFFFFF"></div>

				<div class="col-12 d-flex justify-content-between">
					<h3>Tổng thanh toán: </h3> 
					<span class="price">
						<span class="txtTotal price-mask">{{ Cart::subtotal(false, '', '.') > 0 ? Cart::subtotal(false, '', '.') * 1000 + Session::get('transportFee') : 0 }}</span>
						<small>₫</small>
					</span>
				</div>
				<div class="col-12 mt-1">
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" style="font-size: 20px">Miễn phí vận chuyển</span>
					  	</div>
					  	<select class="transportFeeSelector form-control" style="font-size: 20px">
							<option value="-1"></option>
							@foreach($transCode as $transCodeItem)
							<option value="{{ $transCodeItem->id }}">{{ $transCodeItem->code_name }} ({{ $transCodeItem->code_quantity }})</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-12 mt-3">
					@auth
					<a href="{{ url('cart/payment') }}"><button class="btn btn-danger w-100">Thanh toán</button></a>
					@endauth

					@guest
					<button class="btn btn-danger w-100" data-toggle="modal" data-target="#signInModal">Thanh toán</button>
					@endguest
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
@endsection

@push('myscript')
<script type="text/javascript">
	// INCREASE QTY
	$('.insBtn').click(function() {
		var id = $(this).data('novelId');
		$.ajax({
			url: "{{ url('cart/ajax/increase-qty') }}",
			type: "POST",
			dataType: "json",
			data: { 
				_token: '{{ csrf_token() }}',
				id: id 
			}
		}).done(function(data) {
			if(data.status) {
				$("input[data-novel-id='" + id + "']").val(data.qty);
				$(".txtSubtotal").text(data.subtotal);
				$(".txtTotal").text(() => {
					let newPrice = '';
					let price = data.subtotal * 1000 + data.transfee; 
					let priceLength = price.toString().length;
	                for(let i = 0; i < priceLength; i++) {
	                    if((i + 1) % 3 == 0 && i != priceLength - 1) newPrice = '.' + price.toString()[priceLength - i - 1] + newPrice;
	                    else newPrice = price.toString()[priceLength - i - 1] + newPrice;
	                }
	                return newPrice;
				});
			}
			else {
				swal({
				  	title: "Oops!",
				  	text: "Tiếc là sản phẩm chỉ có số lượng từng đó thôi á~",
				  	icon: "error",
				  	button: "OK",
				});
			}
		});
	});

	// DECREASE QTY
	$('.desBtn').click(function() {
		var id = $(this).data('novelId');
		$.ajax({
			url: "{{ url('cart/ajax/decrease-qty') }}",
			type: "POST",
			dataType: "json",
			data: { 
				_token: '{{ csrf_token() }}',
				id: id 
			}
		}).done(function(data) {
			if(data.status) {
				$("input[data-novel-id='" + id + "']").val(data.qty);
				$(".txtSubtotal").text(data.subtotal);
				$(".txtTotal").text(() => {
					let newPrice = '';
					let price = data.subtotal * 1000 + data.transfee; 
					let priceLength = price.toString().length;
	                for(let i = 0; i < priceLength; i++) {
	                    if((i + 1) % 3 == 0 && i != priceLength - 1) newPrice = '.' + price.toString()[priceLength - i - 1] + newPrice;
	                    else newPrice = price.toString()[priceLength - i - 1] + newPrice;
	                }
	                return newPrice;
				});
			}
		});
	});

	// REMOVE
	$('.rmvBtn').click(function() {
		var id = $(this).data('novelId');
		$.ajax({
			url: "{{ url('/cart/ajax/remove') }}",
			type: "POST",
			dataType: "json",
			data: { 
				_token: '{{ csrf_token() }}',
				id: id 
			}
		}).done(function(data) {
			if(data.subtotal > 0) {
				$(".cart-item[data-novel-id='" + id + "']").hide();
				$(".txtSubtotal").text(data.subtotal);
				$(".txtTotal").text(() => {
					let newPrice = '';
					let price = data.subtotal * 1000 + data.transfee; 
					let priceLength = price.toString().length;
	                for(let i = 0; i < priceLength; i++) {
	                    if((i + 1) % 3 == 0 && i != priceLength - 1) newPrice = '.' + price.toString()[priceLength - i - 1] + newPrice;
	                    else newPrice = price.toString()[priceLength - i - 1] + newPrice;
	                }
	                return newPrice; 
				});
			}
			else {
				$(".cart-container").hide();
				$(".header-notify").removeClass('d-block');
			} 
		});
	});
</script>
<script type="text/javascript">
	// TRANSPORT FEE
	$('.transportFeeSelector').change(function() {
		id = $(this).val();

		$.ajax({
			url: "{{ url('cart/ajax/free-transport-fee') }}",
			type: 'POST',
			dataType: 'json',
			data: {
				_token: '{{ csrf_token() }}',
				id: id
			}
		}).done(function(data) {
			if(data.status) {
				$(".txtTotal").text(data.subtotal);
				$(".txtTransFee").text(0);
			}
			else {
				$(".txtTotal").text(() => {
					let newPrice = '';
					let price = data.subtotal * 1000 + data.transfee; 
					let priceLength = price.toString().length;
	                for(let i = 0; i < priceLength; i++) {
	                    if((i + 1) % 3 == 0 && i != priceLength - 1) newPrice = '.' + price.toString()[priceLength - i - 1] + newPrice;
	                    else newPrice = price.toString()[priceLength - i - 1] + newPrice;
	                }
	                return newPrice; 
				});
				$(".txtTransFee").text(() => {
					let newPrice = '';
					let price = data.transfee; 
					let priceLength = price.toString().length;
	                for(let i = 0; i < priceLength; i++) {
	                    if((i + 1) % 3 == 0 && i != priceLength - 1) newPrice = '.' + price.toString()[priceLength - i - 1] + newPrice;
	                    else newPrice = price.toString()[priceLength - i - 1] + newPrice;
	                }
	                return newPrice; 
				});
			}
		});
	});
</script>
@endpush