@extends('layouts.frontend-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/novels.css') }}">
@endpush

@section('content')
<div id="novels-section">
	<!-- NOVELS LIST -->
	<div class="novels-list">
		<div class="row position-relative">
			<div class="col-3 tags-list">
				<h4>DANH MỤC</h4>
				<ul class="nav flex-column">
					@foreach($tags as $tagsItem)
						@if($tagFocused == $tagsItem->id)
						<li class="nav-item nav-item-focus">
					    	<a class="nav-link nav-link-focus" href="{{ url('/novels/tag/'.$tagsItem->id) }}">{{'∟ '.$tagsItem->tag_name.' ('.$tagsItem->tag_quantity.')'}}</a>
					  	</li>
					  	@else
					  	<li class="nav-item">
					    	<a class="nav-link" href="{{ url('/novels/tag/'.$tagsItem->id) }}">{{'∟ '.$tagsItem->tag_name.' ('.$tagsItem->tag_quantity.')'}}</a>
					  	</li>
					  	@endif
					@endforeach
				</ul>		
			</div>
			<div class="col-9">
				<div class="row">
					@foreach($novelsList as $novelsListItem)
					<div class="col-3 novels-list-item">
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
				<div class="row" id="novels-list-pagination">
					{{ $novelsList->links() }}
				</div>
			</div>
			<div class="shadow-mask"></div>
		</div>
	</div>
	<!-- END NOVELS LIST -->
</div>
@endsection

@push('myscript')
@endpush