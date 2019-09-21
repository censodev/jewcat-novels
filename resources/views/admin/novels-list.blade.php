@extends('layouts.admin-master')

@push('mystyle')
<style type="text/css">
	.pagination .page-active { background: #E9ECEF; }
</style>
@endpush

@section('content')
<div id="novels-list-container">
	<table class="table table-sm border-0 bg-white">
		<thead>
			<tr class="text-center">
				<th>ID</th>
				<th>NAME</th>
				<th>AUTHOR</th>
				<th>PUBLISHER</th>
				<th>ROOT PRICE</th>
				<th>QUANT</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			@foreach($novels as $novelsItem)
			<tr class="text-center">
				<td>{{ $novelsItem->id }}</td>
				<td data-toggle="tooltip" data-placement="right" title="{{ $novelsItem->novel_name }}">{{ str_limit($novelsItem->novel_name, 20) }}</td>
				<td>{{ $novelsItem->author_name }}</td>
				<td>{{ $novelsItem->novel_publisher }}</td>
				<td class="price-mask">{{ $novelsItem->novel_price }}</td>
				<td>{{ $novelsItem->novel_quantity }}</td>
				<td>
					<a href="/admin/novels-list#" class="badge badge-info">Info</a>
					<a href="/admin/novels-list#" class="badge badge-danger">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		{{ $novels->links() }}
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