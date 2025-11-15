@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
    <section class="user-login section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="block">
						<!-- Image -->
						<div class="image align-self-center">
							<img class="img-fluid" src="{{ asset('images/Login/front-desk-sign-in.jpg') }}" alt="desk-sign-in">
						</div>

						<!-- Content -->
						<div class="content text-center">
							<div class="logo">
								<a href="{{ route('home') }}">
									<img src="{{ asset('images/logo.png') }}" alt="Smartnesa Logo">
								</a>
							</div>

							<div class="title-text">
								<h3>Sign in to Your Account</h3>
							</div>

							<!-- Error Messages -->
							@if ($errors->any())
								<div class="alert alert-danger text-left mb-3">
									<ul class="mb-0">
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<!-- Session Status -->
							@if (session('status'))
								<div class="alert alert-success mb-3">
									{{ session('status') }}
								</div>
							@endif

							<!-- Login Form -->
							<form method="POST" action="{{ route('login') }}">
								@csrf

								<!-- Email -->
								<input
									class="form-control main @error('email') is-invalid @enderror"
									type="email"
									name="email"
									value="{{ old('email') }}"
									placeholder="Email Address"
									required
									autofocus
								>
								@error('email')
									<span class="invalid-feedback d-block text-left" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<!-- Password -->
								<input
									class="form-control main @error('password') is-invalid @enderror"
									type="password"
									name="password"
									placeholder="Password"
									required
								>
								@error('password')
									<span class="invalid-feedback d-block text-left" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<!-- Remember Me -->
								<div class="form-check text-left mb-3">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<label class="form-check-label" for="remember">
										Remember Me
									</label>
								</div>

								<!-- Submit Button -->
								<button type="submit" class="btn btn-main-sm">Sign In</button>
							</form>

							<div class="new-acount">
								@if (Route::has('password.request'))
									<a href="{{ route('password.request') }}">Forget your password?</a>
								@endif

								@if (Route::has('register'))
									<p>Don't Have an account? <a href="{{ route('register') }}">SIGN UP</a></p>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- To Top -->
	<div class="scroll-top-to">
		<i class="ti-angle-up"></i>
	</div>
@endsection

@push('styles')
<style>
	.invalid-feedback {
		font-size: 0.875rem;
		margin-top: 0.25rem;
	}

	.form-control.is-invalid {
		border-color: #dc3545;
	}

	.alert {
		border-radius: 5px;
		padding: 12px 20px;
	}

	.alert ul {
		padding-left: 20px;
	}
</style>
@endpush
