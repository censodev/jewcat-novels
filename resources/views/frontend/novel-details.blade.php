@extends('layouts.frontend-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/novel-details.css') }}">
@endpush

@section('content')
<div id="novel-details-section">
	{{-- MAIN DETAILS --}}
	<div class="row novel-main-details">
		<div class="col-4 img-container">
			<img src="{{ asset('images/novels/'.$target->novel_image_url) }}">
		</div>
		<div class="col-8 details">
			<div class="shadow-mask"></div>
			<div class="details-container">
				<div class="row">
					<h4>{{ $target->novel_name }}</h4>
				</div>
				<hr>
				<div class="row">
					<div class="col-12">
						@if($target->novel_sale_off)
						<button class="add-to-cart-btn" data-product-id="{{ $target->id }}">
							<span class="price-title">
								<span class="price-mask">{{ round($target->novel_price * (100 - $target->novel_sale_off) / 100, -3) }}</span> ₫
							</span>
							<span class="add-to-cart-title"><i class="fas fa-shopping-cart"></i></span>
							<span class="sale-off-title">{{ '-'.$target->novel_sale_off.'%' }}</span>
						</button>
						<span class="sale-off-content">
							<strike><span class="price-mask">{{ $target->novel_price }}</span> ₫</strike>
						</span>
						@else
						<button class="add-to-cart-btn" data-product-id="{{ $target->id }}">
							<span class="price-title">
								<span class="price-mask">{{ $target->novel_price }}</span> ₫
							</span>
							<span class="add-to-cart-title"><i class="fas fa-shopping-cart"></i></span>
						</button>
						@endif
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-6">
						<p>Tác giả: {{ $target->author_name }}</p>
						@if($target->novel_translator)
						<p>Dịch giả: {{ $target->novel_translator }}</p>
						@endif
						<p>Số lượng: {{ $target->novel_quantity }}</p>
						<p>Ngôn ngữ: {{ $target->novel_language }}</p>
						<p>NXB: {{ $target->novel_publisher }}</p>
						<p>Kích thước: {{ $target->novel_size }}</p>
						<p>Số trang: {{ $target->novel_pages }}</p>
					</div>
					<div class="col-6">
						<p>Đánh giá:&nbsp;
							<span class="rating-container">
								@switch($target->novel_rank)
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
							<span>({{ $target->novel_votes_number }})</span>
						</p>
						<div class="rating-details">
							<img src="{{ asset('images/icons/star_rating_1_of_5.png') }}">
							<span>({{ $target->novel_rating_1 }})</span>
							<div class="progress">
								@if($target->novel_votes_number)
								<div class="progress-bar" role="progressbar" style="width: {{ $target->novel_rating_1 / $target->novel_votes_number * 100 }}%"></div>
								@else
								<div class="progress-bar" role="progressbar" style="width: 0%"></div>
								@endif
							</div>
						</div>
						<div class="rating-details">
							<img src="{{ asset('images/icons/star_rating_2_of_5.png') }}">
							<span>({{ $target->novel_rating_2 }})</span>
							<div class="progress">
								@if($target->novel_votes_number)
								<div class="progress-bar" role="progressbar" style="width: {{ $target->novel_rating_2 / $target->novel_votes_number * 100 }}%"></div>
								@else
								<div class="progress-bar" role="progressbar" style="width: 0%"></div>
								@endif
							</div>
						</div>
						<div class="rating-details">
							<img src="{{ asset('images/icons/star_rating_3_of_5.png') }}">
							<span>({{ $target->novel_rating_3 }})</span>
							<div class="progress">
								@if($target->novel_votes_number)
								<div class="progress-bar" role="progressbar" style="width: {{ $target->novel_rating_3 / $target->novel_votes_number * 100 }}%"></div>
								@else
								<div class="progress-bar" role="progressbar" style="width: 0%"></div>
								@endif
							</div>
						</div>
						<div class="rating-details">
							<img src="{{ asset('images/icons/star_rating_4_of_5.png') }}">
							<span>({{ $target->novel_rating_4 }})</span>
							<div class="progress">
								@if($target->novel_votes_number)
								<div class="progress-bar" role="progressbar" style="width: {{ $target->novel_rating_4 / $target->novel_votes_number * 100 }}%"></div>
								@else
								<div class="progress-bar" role="progressbar" style="width: 0%"></div>
								@endif
							</div>
						</div>
						<div class="rating-details">
							<img src="{{ asset('images/icons/star_rating_5_of_5.png') }}">
							<span>({{ $target->novel_rating_5 }})</span>
							<div class="progress">
								@if($target->novel_votes_number)
								<div class="progress-bar" role="progressbar" style="width: {{ $target->novel_rating_5 / $target->novel_votes_number * 100 }}%"></div>
								@else
								<div class="progress-bar" role="progressbar" style="width: 0%"></div>
								@endif
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<h4>Thể loại</h4>
					<div class="col-12">
						@foreach($tags as $tagsItem)
						<a href="{{ url('/novels/tag/'.$tagsItem->id) }}" class="tag-item">{{$tagsItem->tag_name}}</a>
						@endforeach
					</div>
				</div>
				<hr>
				<div class="row">
					<h4>Mô tả</h4>
					<div class="col-12">{!! $target->novel_description !!}</div>	
				</div>
			</div>
		</div>
	</div>
	{{-- END MAIN DETAILS --}}

	{{-- SAME AUTHOR --}}
	@if($sameAuthorList)
	<div class="row same-author-list">
		<h3>ĐỒNG TÁC GIẢ</h3>
		<div class="row same-author-list-container">
			@foreach($sameAuthorList as $sameAuthorListItem)
			<div class="col-2 novels-list-item">
				<a href="{{ url('/novels/'.$sameAuthorListItem->id) }}">
					<div class="img-container d-flex justify-content-center">
						<img src="{{ asset('images/novels/'.$sameAuthorListItem->novel_image_url) }}">
					</div>
					<div class="novel-overview">
						<label>{{ $sameAuthorListItem->novel_name }}</label>
						<div class="rating-container">
							@switch($sameAuthorListItem->novel_rank)
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
							<small>({{ $sameAuthorListItem->novel_votes_number }})</small>
						</div>
						<div>
							<p class="novel-item-price">
								<span class="price-mask">{{ round($sameAuthorListItem->novel_price * (100 - $sameAuthorListItem->novel_sale_off) / 100, -3) }}</span> 
								<smal>₫</smal>
							</p>
							@if($sameAuthorListItem->novel_sale_off)
							<span>
								<i><strike>
									<span class="price-mask">{{ $sameAuthorListItem->novel_price }}</span>
									<small>₫</small> 
								</strike></i>
								<div class="sale-off-title">{{ '-'.$sameAuthorListItem->novel_sale_off.'%' }}</div>
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
	@endif
	{{-- END SAME AUTHOR --}}
</div>
@endsection

@push('myscript')
<script type="text/javascript">
	$('.novel-main-details .add-to-cart-btn').hover(
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
			  	text: "Sản phẩm đã được chuyển vào rỏ hàng, check ngay nào ~",
			  	icon: "success",
			  	button: "OK",
			});

			$('.header-notify').show();
		});
	});
</script>
@endpush