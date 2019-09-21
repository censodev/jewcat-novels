<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frontend/header.css') }}">

<div id="front-header">
	{{-- NAV --}}
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('images/jewcatnovels-logo.png') }}">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  		<ul class="navbar-nav mr-auto" id="linked-list">
	  			<li class="nav-item">
		        	<a class="nav-link" id="news-redirector" href="{{ url('/news') }}">News</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" id="novels-redirector" href="{{ url('/novels') }}">Novels</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" id="blogs-redirector" href="{{ url('/blogs') }}">Blogs</a>
		      	</li>
		      	<li class="nav-item position-relative">
		        	<a class="nav-link" id="cart-redirector" href="{{ url('/cart') }}">Cart</a>

		        	@if(Cart::count() > 0)
		        	<span class="header-notify badge badge-pill badge-danger position-absolute d-block p-0" style="top:8px;right:8px;width:10px;height:10px"></span>
		        	@else
		        	<span class="header-notify badge badge-pill badge-danger position-absolute p-0" style="top:8px;right:8px;width:10px;height:10px"></span>
		        	@endif
		        	
		      	</li>
	  		</ul>
	  		<hr>
	  		<ul class="navbar-nav" id="signin-profile">
	  			@guest
	  			<li class="nav-item">
		        	<a class="nav-link" href="#" data-toggle="modal" data-target="#signInModal"><i class="fas fa-sign-in-alt"></i> Sign In</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal"><i class="fas fa-edit"></i> Register</a>
		      	</li>
		      	@endguest

		      	@auth
		      	<li class="nav-item">
		      		<div class="dropdown">
			        	<a class="nav-link" href="#" role="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        		<div class="user-img d-inline-block">
		      					<img src="{{ asset('images/users/'.Auth::user()->image_url) }}">
		      				</div>
			        		<span>{{ str_limit(Auth::user()->name, 20) }}</span>
			        	</a>

			        	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownProfile">
						    <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Profile</a>
						    <a class="dropdown-item" href="/signout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign out</a>
					  	</div>
				 	 </div>
		      	</li>
		      	@endauth
	  		</ul>
	  		<hr>
	  	</div>


		{{-- SIGNIN MODAL --}}	
		<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModalLabel" aria-hidden="true" data-error="{{Session::get('errorSignin')}}">
	  		<div class="modal-dialog" role="document">
	    		<div class="modal-content">
	     			<div class="modal-header border-0">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
	      			</div>
	      			<div class="modal-body">
			        	<form method="POST" action="{{ url('/signin') }}" class="row needs-validation" novalidate>
							@csrf

							<h1 class="text-center col-12">JewCatNovels</h1>

							@if(Session::get('errorSignin'))
							<div class="alert alert-danger col-12 text-center" role="alert">
								{{Session::get('errorSignin')}}
							</div>
							@endif
							
							<div class="input-group col-12">
						  		<div class="input-group-prepend">
						    		<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
						 		</div>
						  		<input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="txtEmail" value="{{ old('txtEmail') }}" required>
						  		<div class="invalid-feedback">Please type your email</div>
							</div>

							<div class="input-group col-12">
						  		<div class="input-group-prepend">
						    		<span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"></i></span>
						 		</div>
						  		<input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" name="txtPassword" required>
						  		<div class="invalid-feedback">Please type your password</div>
							</div>

							<div class="col-12 rmbme-fgpwd">
								<div class="row">
									<div class="col-7">
										<div class="checkbox-container d-inline-block">	
											<input class="origin-checkbox" id="checkRemember" type="checkbox" name="checkRemember">
											<div class="checkmask" id="checkMarkRemember">✔</div>
										</div>
										<span>&nbsp;Remember me</span>
									</div>
									<div class="col-5 d-flex justify-content-end">
										<a href="#">Forgot password</a>
									</div>
								</div>	
							</div>
							
							<div class="col-12 buttons-group">
								<button class="w-100" id="signin-btn" type="submit">SIGN IN</button>
							</div>
			        	</form>
			      	</div>
			      	<div class="modal-footer border-0"></div>
	    		</div>
	  		</div>
		</div>
		{{-- END SIGNIN MODAL --}}

		{{-- REGISTER MODAL --}}	
		<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true" data-error="{{Session::get('errorRegister')}}">
	  		<div class="modal-dialog modal-register" role="document">
	    		<div class="modal-content">
	     			<div class="modal-header border-0">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
	      			</div>
	      			<div class="modal-body">
			        	<form method="POST" action="{{ url('/register') }}" class="row needs-validation" novalidate>
							@csrf

							<h1 class="text-center col-12">JewCatNovels</h1>

							@if(Session::get('errorRegister'))
							<div class="alert alert-danger col-12 text-center" role="alert">
  								{{Session::get('errorRegister')}}
							</div>
							@endif

							<div class="col-12">
								<div class="row">
									<div class="input-group col-12">
								  		<input type="" class="form-control" placeholder="Full Name" name="txtUsn" value="{{ old('txtUsn') }}" required>
								  		<div class="invalid-feedback">Please type your name</div>
									</div>
								</div>
							</div>
							
							<div class="col-12">
								<div class="row">
									<div class="input-group col-12">
								  		<input type="email" class="form-control" placeholder="Email" name="txtEmail" value="{{ old('txtEmail') }}" required>
								  		<div class="invalid-feedback">Please type your email</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="input-group col-6">
								  		<input type="password" class="form-control" placeholder="Password" name="txtPassword" minlength="8" required>
								  		<div class="invalid-feedback">Please type a password (at least 8 characters)</div>
									</div>
									<div class="input-group col-6">
								  		<input type="password" class="form-control" placeholder="Confirm Password" name="txtConfPassword" minlength="8" required>
								  		<div class="invalid-feedback">Please confirm your password</div>
									</div>
								</div>
							</div>

							{{-- <div class="col-12">
								<div class="row">
									<div class="input-group col-12">
								  		<input type="" class="form-control" placeholder="Phone Number" name="txtPhone" value="{{ old('txtPhone') }}" required>
								  		<div class="invalid-feedback">Please type your phone number</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="row">
									<div class="input-group col-12">
								  		<input type="" class="form-control" placeholder="Address" name="txtAddress" value="{{ old('txtAddress') }}" required>
								  		<div class="invalid-feedback">Please type your address</div>
									</div>
								</div>
							</div> --}}
							
							
							<div class="col-12">
								<br>
								<a href="#">Điều khoản sử dụng</a>
							</div>

							<div class="col-12 position-relative">
								<div class="checkbox-container d-inline-block">	
									<input type="checkbox" id="checkAcceptTerm" class="origin-checkbox">
									<div class="checkmask" id="checkMarkAcceptTerm">✔</div>
								</div>
								<span>&nbsp;Tôi đồng ý với các điều khoản trên</span>
							</div>
							

							<div class="col-12 buttons-group">
								<button class="w-100" id="register-btn" type="submit" disabled>REGISTER</button>
							</div>
			        	</form>
			      	</div>
			      	<div class="modal-footer border-0"></div>
	    		</div>
	  		</div>
		</div>
		{{-- END REGISTER MODAL --}}


		<div class="faded-mask"></div>
	</nav>
	{{-- END NAV --}}

	<div class="scale-div"></div>
</div>

@push('headerScript')
<script type="text/javascript">
	$(document).ready(function() {
		// Call modal when post error
		if($('#signInModal').data('error')) $('#signInModal').modal('show');
		if($('#registerModal').data('error')) $('#registerModal').modal('show');

		// Check term
		$('#checkAcceptTerm').prop('checked', false);
		$('#checkAcceptTerm').change(function() {
			if(document.getElementById('checkAcceptTerm').checked) {
				$('#register-btn').removeAttr('disabled');
				$('#register-btn').css({
					"background-color": "#89AAAE",
					"border": "1px solid #89AAAE"
				});
			}
			else {
				$('#register-btn').prop('disabled', 'true');
				$('#register-btn').css({
					"background-color": "#CACACA",
					"border": "1px solid #CACACA"
				});
			}
		});

		// Customized checkbox
		$('#checkRemember').change(function() {
			if(document.getElementById('checkRemember').checked) {
				$('#checkMarkRemember').show();
			}
			else {
				$('#checkMarkRemember').hide();
			}
		});
		$('#checkAcceptTerm').change(function() {
			if(document.getElementById('checkAcceptTerm').checked) {
				$('#checkMarkAcceptTerm').show();
			}
			else {
				$('#checkMarkAcceptTerm').hide();
			}
		});
		
	})
</script>
@endpush

