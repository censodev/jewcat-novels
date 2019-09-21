@extends('layouts.admin-master')

@push('mystyle')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/novels-add.css') }}">
@endpush

@section('content')
<form id="novels-add-container" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-3">
			<div class="tabs img-container position-relative">
				<div class="img-base text-center">
					<span class="img-base-inner">+</span>
				</div>
				<img>
				<input type="file" name="fileImage" id="input-image">
			</div>
		</div>
		<div class="col-9">
			<div class="tabs">

				@if(Session::get('err'))
				<div class="row">
					<div class="col-12">
						@foreach(Session::get('err') as $errItem)
						<div class="alert alert-danger col-12 text-center">
							{{ $errItem }}
						</div>
						@endforeach
					</div>
				</div>
				@elseif(Session::get('success'))
					<div class="col-12">
						<div class="alert alert-success col-12 text-center">
							{{ Session::get('success') }}
						</div>
					</div>
				@endif

				<div class="row">
					<div class="input-container col-8">
						<span class="input-label"><span style="color:red">*</span> Novel Name</span>
						<input class="form-control input-content" type="text" name="txtName" value="{{ old('txtName') }}" required style="text-transform:uppercase">
						<div class="invalid-feedback">Please type novel's name</div>
					</div>
					<div class="input-container col-4">
						<span class="input-label"><span style="color:red">*</span> Root Price <small><b>(VND)</b></small></span>
						<input class="form-control input-content price-mask" type="text" name="txtPrice" value="{{ old('txtPrice') }}" required>
						<div class="invalid-feedback">Please type root price</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="input-container col-6">
						<span class="input-label"><span style="color:red">*</span> Available Authors</span>
						<select class="form-control input-content" name="selectAuthor" required>
							<option></option>
							@foreach($authorsList as $authorsListItem)
							<option {{ old('selectAuthor') ==  $authorsListItem->id ? 'selected' : '' }} value="{{ $authorsListItem->id }} ">{{ $authorsListItem->author_name }}</option>
							@endforeach
						</select>
						<div class="invalid-feedback">Please choose an author</div>
					</div>
					<div class="input-container col-6">
						<span class="input-label">Translator(s)</span>
						<input class="form-control input-content" type="text" name="txtTranslator" value="{{ old('txtTranslator') }}">
					</div>
				</div>

				<div class="row">
					<div class="input-container col-6">
						<span class="input-label"><span style="color:red">*</span> Publisher</span>
						<input class="form-control input-content" type="text" name="txtPublisher" value="{{ old('txtPublisher') }}" required>
						<div class="invalid-feedback">Please type publisher</div>
					</div>
					<div class="input-container col-6">
						<span class="input-label"><span style="color:red">*</span> Language</span>
						<input class="form-control input-content" type="text" name="txtLanguage" value="{{ old('txtLanguage') }}" required>
						<div class="invalid-feedback">Please type language</div>
					</div>
				</div>
				<div class="row">
					<div class="input-container col-4">
						<span class="input-label"><span style="color:red">*</span> Quantity</span>
						<input class="form-control input-content" type="number" min="1" name="txtQuantity" value="{{ old('txtQuantity') }}" required>
						<div class="invalid-feedback">Please type novel's quantity</div>
					</div>
					<div class="input-container col-4">
						<span class="input-label"><span style="color:red">*</span> Size</span>
						<input class="form-control input-content" type="text" name="txtSize" value="{{ old('txtSize') }}" required>
						<div class="invalid-feedback">Please type novel's size</div>
					</div>
					<div class="input-container col-4">
						<span class="input-label"><span style="color:red">*</span> Pages</span>
						<input class="form-control input-content" type="number" min="1" name="txtPages" value="{{ old('txtPages') }}" required>
						<div class="invalid-feedback">Please type the number of novel's pages</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<label class="col-12 tags-label"><span style="color:red">*</span> Tags</label>
					<div class="col-12">
						@foreach($tagsList as $tagsListItem)
						<div class="checkbox-container d-inline-block">
							<input type="checkbox" class="origin-checkbox" name="checkTags[]" value="{{ $tagsListItem->id }}" {{ old('checkTags') && in_array($tagsListItem->id, old('checkTags')) ? 'checked' : '' }}>
							<div class="fake-checkbox disabled">{{ $tagsListItem->tag_name }}</div>
						</div>
						@endforeach
					</div>
				</div>

				<hr>

				<div class="row">
					<label class="col-12 tags-label">Description</label>
					<div class="col-12"><textarea name="txtDescription" id="editor">{{ old('txtDescription') }}</textarea></div>
				</div>
				
				<hr>

				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<button type="submit" class="btn btn-dark w-25"><b>ADD</b></button>
					</div>
				</div>

			</div>
		</div>
	</div>
</form>
@endsection

@push('myscript')
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
	$(document).ready(function() {
		// img
	    $('#input-image').change(function() {
	        if (this.files && this.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $('.img-container img').attr('src', e.target.result);
	            };
	            reader.readAsDataURL(this.files[0]);
	        }
	    });

	    // tags checkbox
		for (var i = $('.origin-checkbox').length - 1; i >= 0; i--) {
			if($('.origin-checkbox').eq(i).prop('checked')) {
				$('.origin-checkbox').eq(i).next('.fake-checkbox').removeClass('disabled');
				$('.origin-checkbox').eq(i).next('.fake-checkbox').addClass('active');
			}
			else {
				$('.origin-checkbox').eq(i).next('.fake-checkbox').removeClass('active');
				$('.origin-checkbox').eq(i).next('.fake-checkbox').addClass('disabled');	
			}
		}

		$('.origin-checkbox').change(function(e) {
			if(e.target.checked) {
				$(this).next('.fake-checkbox').removeClass('disabled');
				$(this).next('.fake-checkbox').addClass('active');
			}
			else {
				$(this).next('.fake-checkbox').removeClass('active');
				$(this).next('.fake-checkbox').addClass('disabled');
			}
		});

		//ckeditor
		ClassicEditor
		    .create(document.querySelector( '#editor' ))
			    .then( editor => {
			    	
			    })
			    .catch( error => {
			        console.error( error );
			    });
			});

</script>
@endpush