@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')

 <div class="gradient-bg"></div>
    <div class="floating-shape shape1"></div>
    <div class="floating-shape shape2"></div>
    <div class="floating-shape shape3"></div>

    <div class="login-wrapper">

        <!-- LEFT PANEL -->


        <!-- RIGHT PANEL -->
        <div class="hero-side">
            <div class="hero-content">
                <h1>Achieve Your Dream.<br>Brighten Your Future.</h1>
                <p>
                    Smartnesa adalah platform inovatif yang mengintegrasikan teknologi canggih
                    dengan pendidikan untuk menciptakan pengalaman belajar yang interaktif
                    dan efektif. Dengan antarmuka yang ramah pengguna dan berbagai fitur
                    yang dirancang untuk memfasilitasi pembelajaran.
                </p>

                <img src="images/loginpic.png" class="hero-img" alt="Smartnesa Students">
            </div>
        </div>
        <div class="login-card glass">

            <div class="header">
                <h2>Welcome👋</h2>
                <p>Your journey to a brighter future starts here</p>
            </div>

            <form>
                <div class="input-wrap">
                    <label>Name</label>
                    <input type="name" placeholder="Enter your name" required>
                </div>

                <div class="input-wrap">
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email" required>
                </div>

                <div class="input-wrap">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" required>
                </div>

                <div class="options">
                    <label class="remember">
                        <input type="checkbox">
                        Remember me
                    </label>
                    <a href="#" class="forgot">Forgot Password?</a>
                </div>

                <button class="btn-login">Sign Up →</button>

                <p class="register-text">
                    Have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </form>
        </div>
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
