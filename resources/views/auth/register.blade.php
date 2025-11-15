@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')

	<section class="user-login section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="block">
						<!-- Image -->
						<div class="image align-self-center"><img class="img-fluid" src="images/Login/sign-up.jpg"
								alt="desk-sign-up">
						</div>
						<!-- Content -->
						<div class="content text-center">
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" alt=""></a>
							</div>
							<div class="title-text">
								<h3>Sign Up for New Account</h3>
							</div>
							<form action="#">
								<!-- Username -->
								<input class="form-control main" type="text" placeholder="Your Name" required>
								<!-- Email -->
								<input class="form-control main" type="email" placeholder="Email Address" required>
								<!-- Password -->
								<input class="form-control main" type="password" placeholder="Password" required>
								<!-- Submit Button -->
								<button class="btn btn-main-md">sign up</button>
							</form>
							<div class="new-acount">
								<p>Anready have an account? <a href="sign-in.html">SIGN IN</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--====  End of Sign Up  ====-->


	<!-- To Top -->
	<div class="scroll-top-to">
		<i class="ti-angle-up"></i>
	</div>

@endsection
