@extends('layouts.frontend-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/payment.css') }}">
@endpush

@section('content')
<div class="payment">
	<div class="row">
		<div class="col-7">
			<div class="col-12 bg-white p-3 box">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center">THÔNG TIN CÁ NHÂN</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-4">Tên:</div>
					<div class="col-6">{{ Auth::check() ? Auth::user()->name : '' }}</div>
				</div>
				<div class="row">
					<div class="col-4">Số ĐT:</div>
					<div class="col-6">{{ Auth::check() ? Auth::user()->phone_number : '' }}</div>
				</div>
				<div class="row">
					<div class="col-4">Địa chỉ:</div>
					<div class="col-6">
						<span class="txtMaskAddress">{{ Auth::check() ? Auth::user()->address : '' }}</span>
						<div class="collapse" id="addressCollapse">
							<input class="form-control" name="txtAddress" value="{{ Auth::check() ? Auth::user()->address : '' }}" required>
							<div class="invalid-feedback">Vui lòng điền địa chỉ</div>
						</div>
					</div>
					<div class="col-2 d-flex justify-content-end">
						<button class="btn p-0" type="button" data-toggle="collapse" data-target="#addressCollapse">
							<i class="far fa-edit"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="col-12 bg-white p-3 box mt-3">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center">THÔNG TIN THANH TOÁN</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-4">Phí sản phẩm:</div>
					<div class="col-6 d-flex align-items-center">
						<span>
							<span class="price-mask">{{ Cart::subtotal(false, '', '.') }}</span> 
							₫
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-4">Phí vận chuyển:</div>
					<div class="col-6 d-flex align-items-center">
						<span>
							<span class="price-mask">{{ Session::get('transportFee') }}</span> 
							₫
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-4">Tổng số tiền:</div>
					<div class="col-6 d-flex align-items-center">
						<span class="text-danger" style="font-size: 35px">
							<span class="price-mask">{{ Cart::subtotal(false, '', '.') * 1000 + Session::get('transportFee') }}</span> 
							₫
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-4">Phương thức thanh toán:</div>
					<div class="col-6">
						<span class="txtPayMethod"></span>
						<div class="collapse" id="payMethodCollapse">
							<select class="form-control" name="selectPayMethod">
								<option value="1">Thanh toán khi giao hàng</option>
								<option value="2">Thanh toán qua thẻ tín dụng</option>
							</select>
						</div>
						
					</div>
					<div class="col-2 d-flex justify-content-end">
						<button class="btn p-0" type="button" data-toggle="collapse" data-target="#payMethodCollapse">
							<i class="far fa-edit"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="col-12 bg-white p-3 box">
				<div class="row">
					<div class="col-12">
						<h3 class="text-center">DANH MỤC SẢN PHẨM</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<table class="table">
							<thead class="text-center">
								<th class="text-left">Tên SP</th>
								<th>SL</th>
								<th>Thành tiền</th>
							</thead>
							<tbody>
								@foreach(Cart::content() as $cartItem)
								<tr>
									<td data-toggle="tooltip" data-placement="top" title="{{ $cartItem->name }}">{{ str_limit($cartItem->name, 30) }}</td>
									<td class="text-center">{{ $cartItem->qty }}</td>
									<td class="text-center price-mask">{{ $cartItem->price }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12 p-0 mt-4 d-flex justify-content-between">
				<button class="btn btn-danger submit-btn">Quay lại</button>
				<button class="btn btn-success submit-btn">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
@endsection

@push('myscript')
<script type="text/javascript">
	$(document).ready(function() {
		// Display Address
		$('input[name=txtAddress]').keyup(function() {
			let str = $(this).val();
			$('.txtMaskAddress').text(str);
		});

		// Display Pay Method
		$('.txtPayMethod').text($('select[name=selectPayMethod] option:selected').text());
		$('select[name=selectPayMethod]').change(function() {
			let str = $('select[name=selectPayMethod] option:selected').text();
			$('.txtPayMethod').text(str);
		});

		// Tooltips
	  	$('[data-toggle="tooltip"]').tooltip();
		
	});
</script>
@endpush