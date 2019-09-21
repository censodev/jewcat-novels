@extends('layouts.admin-master')

@push('mystyle')
<style type="text/css">
	.pagination .page-active { background: #E9ECEF; }

	.status-badge {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 15px;
		height: 15px;
		padding: 0;
	}
</style>
@endpush

@section('content')
<div class="orders-list-container">
	<table class="table table-sm border-0 bg-white">
		<thead>
			<tr class="text-center">
				<th>ID</th>
				<th>USER ID</th>
				<th>PRICE</th>
				<th>STATUS</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ordersList as $ordersItem)
			<tr class="text-center">
				<td data-toggle="tooltip" data-placement="right" title="{{ $ordersItem->id }}">{{ str_limit($ordersItem->id, 10) }}</td>
				<td>{{ $ordersItem->user_id }}</td>
				<td class="price-mask">{{ $ordersItem->order_price }}</td>
				<td class="position-relative">
					<span class="status-badge badge badge-pill badge-success d-block"></span>
				</td>
				<td>
					<a href="/admin/orders-list#" class="badge badge-info">Info</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		{{ $ordersList->links() }}
	</div>
</div>
@endsection

@push('myscript')
<script type="text/javascript">
	// Tooltips
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	})
</script>
@endpush