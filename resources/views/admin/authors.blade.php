@extends('layouts.admin-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/authors.css') }}">
@endpush

@section('content')
<div id="authors-container">
	<div class="row">
		<div class="col-6">
			<div class="col-12">
				<table class="table table-sm border-0 bg-white text-center">
					<thead >
						<tr>
							<th>ID</th>
							<th>NAME</th>
							<th>ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($authorsList as $authorsListItem)
						<tr>
							<td>{{ $authorsListItem->id }}</td>
							<td>{{ $authorsListItem->author_name }}</td>
							<td>
								<a href="/admin/authors#" class="badge badge-danger">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-12">
				{{ $authorsList->links() }}
			</div>
		</div>
		<div class="col-6 bg-white">
			<form method="POST" class="needs-validation" novalidate>
				@csrf
				<div class="col-12 text-center p-2"><h4 class="mb-0">ADD AUTHOR</h4></div>
				<div class="input-container col-12">
					<span class="input-label"><span style="color:red">*</span> Name</span>
					<input class="form-control input-content" type="text" name="txtName" value="{{ old('txtName') }}" required>
					<div class="invalid-feedback">Please type author's name</div>
				</div>
				<div class="col-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-dark w-100 mb-3"><b>ADD</b></button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection