@extends('layouts.frontend-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/homepage.css') }}">
@endpush

@section('content')
<div id="home-section">
	<!-- SLIDE -->
	<div id="carouselNewestNovels" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($novelsCarousel as $novelsCarouselItem)
			<div class="carousel-item">
				<div class="inner-carousel-item d-flex justify-content-center">
					<img src="{{ asset('images/novels/'.$novelsCarouselItem->novel_image_url) }}">
					<div class="novel-overview">
						<div class="novel-overview-mask"></div>
						<div class="overview-container">
							<h4 class="row"><a href="{{ url('/novels/'.$novelsCarouselItem->id) }}">{{ $novelsCarouselItem->novel_name }}</a></h4>
							<hr>
							<div class="row">
								<div class="col-12">
									@if($novelsCarouselItem->novel_sale_off)
									<button class="add-to-cart-btn" data-product-id="{{ $novelsCarouselItem->id }}">
										<span class="price-title">
											<span class="price-mask">{{ round($novelsCarouselItem->novel_price * (100 - $novelsCarouselItem->novel_sale_off) / 100, -3) }}</span> ₫
										</span>
										<span class="add-to-cart-title"><i class="fas fa-shopping-cart"></i></span>
										<span class="sale-off-title">{{ '-'.$novelsCarouselItem->novel_sale_off.'%' }}</span>
									</button>
									<span class="sale-off-content">
										<strike><span class="price-mask">{{ $novelsCarouselItem->novel_price }}</span> ₫</strike>
									</span>
									@else
									<button class="add-to-cart-btn" data-product-id="{{ $novelsCarouselItem->id }}">
										<span class="price-title">
											<span class="price-mask">{{ $novelsCarouselItem->novel_price }}</span> ₫
										</span>
										<span class="add-to-cart-title"><i class="fas fa-shopping-cart"></i></span>
									</button>
									@endif
								</div>
							</div>
							<hr>
							<a href="{{ url('/novels/'.$novelsCarouselItem->id) }}">
								<div class="row">
									<div class="col-6">
										<p>Tác giả: <span>{{ $novelsCarouselItem->author_name }}</span></p>
										<p>Ngôn ngữ: <span>{{ $novelsCarouselItem->novel_language }}</span></p>
									</div>
									<div class="col-6">
										<p>Số lượng: <span>{{ $novelsCarouselItem->novel_quantity }}</span></p>
										<p>Đánh giá:&nbsp;
											<span class="rating-container">
												@switch($novelsCarouselItem->novel_rank)
													@case(0) 
														<img src="{{ asset('images/icons/star_rating_0_of_5.png') }}"> 
														@break
													@case(1) 
														<img src="{{ asset('images/icons/star_rating_1_of_5.png') }}"> 
														@break
													@case(2) 
														<img src="{{ asset('images/icons/star_rating_2_of_5.png') }}"> 
														@break
													@case(3) 
														<img src="{{ asset('images/icons/star_rating_3_of_5.png') }}"> 
														@break
													@case(4) 
														<img src="{{ asset('images/icons/star_rating_4_of_5.png') }}"> 
														@break
													@case(5) 
														<img src="{{ asset('images/icons/star_rating_5_of_5.png') }}"> 
														@break
												@endswitch
											</span>
											<span>({{ $novelsCarouselItem->novel_votes_number }})</span>
										</p>
									</div>
								</div>
								<hr>
								<div class="row">{!! html_entity_decode($novelsCarouselItem->novel_description) !!}</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		

		<a class="carousel-control-prev" href="#carouselNewestNovels" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselNewestNovels" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- END SLIDE -->

	<!-- NOVELS LIST -->
	<div class="novels-list">
		<h3>DANH SÁCH ĐỀ CỬ</h3>
		<div class="row">
			@foreach($novelsList as $novelsListItem)
			<div class="col-2 novels-list-item">
				<a href="{{ url('/novels/'.$novelsListItem->id) }}">
					<div class="img-container d-flex justify-content-center">
						<img src="{{ asset('images/novels/'.$novelsListItem->novel_image_url) }}">
					</div>
					<div class="novel-overview">
						<label>{{ $novelsListItem->novel_name }}</label>
						<div class="rating-container">
							@switch($novelsListItem->novel_rank)
								@case(0) 
									<img src="{{ asset('images/icons/star_rating_0_of_5.png') }}"> 
									@break
								@case(1) 
									<img src="{{ asset('images/icons/star_rating_1_of_5.png') }}"> 
									@break
								@case(2) 
									<img src="{{ asset('images/icons/star_rating_2_of_5.png') }}"> 
									@break
								@case(3) 
									<img src="{{ asset('images/icons/star_rating_3_of_5.png') }}"> 
									@break
								@case(4) 
									<img src="{{ asset('images/icons/star_rating_4_of_5.png') }}"> 
									@break
								@case(5) 
									<img src="{{ asset('images/icons/star_rating_5_of_5.png') }}"> 
									@break
							@endswitch
							<small>({{ $novelsListItem->novel_votes_number }})</small>
						</div>
						<div>
							<p class="novel-item-price">
								<span class="price-mask">{{ round($novelsListItem->novel_price * (100 - $novelsListItem->novel_sale_off) / 100, -3) }}</span> 
								<smal>₫</smal>
							</p>
							@if($novelsListItem->novel_sale_off)
							<span>
								<i><strike>
									<span class="price-mask">{{ $novelsListItem->novel_price }}</span>
									<small>₫</small> 
								</strike></i>
								<div class="sale-off-title">{{ '-'.$novelsListItem->novel_sale_off.'%' }}</div>
							</span>
							@endif
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="shadow-mask"></div>
	</div>
	<!-- END NOVELS LIST -->
</div>
@endsection

@push('myscript')
<script type="text/javascript">
	$('#carouselNewestNovels .carousel-item').eq(0).addClass('active');

	$('#carouselNewestNovels .add-to-cart-btn').hover(
		function() {
			$(this).find('.price-title').hide();
			$(this).find('.add-to-cart-title').show();
		},	
		function() {
			$(this).find('.price-title').show();
			$(this).find('.add-to-cart-title').hide();
		}
	);
</script>
<script type="text/javascript">
	$('.add-to-cart-btn').click(function(e) {
		var id = $(this).data('productId');
		$.ajax({
			url: '{{ url('cart/ajax/add-to-cart') }}',
			dataType: 'json',
			type: 'POST',
			data: {
				'_token': '{{ csrf_token() }}', 
				'id': id 
			}
		}).done(function(data) {
			swal({
			  	title: "Aye!",
			  	text: "Sản phẩm đã được chuyển vào rỏ hàng, check ngay nào~",
			  	icon: "success",
			  	button: "OK",
			});

			$('.header-notify').show();
		});
	});
</script>
@endpush
