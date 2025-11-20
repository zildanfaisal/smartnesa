@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')

<div class="gradient-bg"></div>
<div class="floating-shape shape1"></div>
<div class="floating-shape shape2"></div>
<div class="floating-shape shape3"></div>

<div class="login-wrapper">

    <!-- LEFT PANEL -->
    <div class="login-card glass">

        <div class="header">
            <h2>Welcome Back 👋</h2>
            <p>Your journey to a brighter future starts here</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-wrap">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="@error('email') is-invalid @enderror"
                    required
                    autofocus
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-wrap">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    class="@error('password') is-invalid @enderror"
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="options">
                <label class="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">Log In →</button>

            @if (Route::has('register'))
                <p class="register-text">
                    Don't have an account?
                    <a href="{{ route('register') }}">Register</a>
                </p>
            @endif
        </form>
    </div>

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

            <img src="{{ asset('images/loginpic.png') }}" class="hero-img" alt="Smartnesa Students">
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Error Styling */
   @push('styles')
<style>
    /* Error Styling */
    .alert {
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        border: 1px solid rgba(220, 53, 69, 0.3);
        color: #dc3545;
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.1);
        border: 1px solid rgba(40, 167, 69, 0.3);
        color: #28a745;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
        list-style: none;
    }

    .alert ul li {
        position: relative;
        padding-left: 20px;
    }

    .alert ul li:before {
        content: "•";
        position: absolute;
        left: 0;
    }

    .input-wrap input.is-invalid {
        border-color: #dc3545 !important;
        background: rgba(220, 53, 69, 0.05);
    }

    .input-wrap input.is-invalid:focus {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
    }

    .error-message {
        display: block;
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
        font-weight: 500;
    }

    /* Existing login page styles */
    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        overflow: auto; /* UBAH DARI hidden KE auto */
    }

    .gradient-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: -2;
    }

    .floating-shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
        z-index: -1;
    }

    .shape1 {
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .shape2 {
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.15);
        bottom: 15%;
        right: 10%;
        animation-delay: 2s;
    }

    .shape3 {
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        top: 60%;
        left: 15%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .login-wrapper {
        display: flex;
        min-height: 100vh; /* UBAH DARI height KE min-height */
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        padding: 50px 40px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        margin-right: 30px;
    }

    .header h2 {
        font-size: 32px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 8px;
    }

    .header p {
        color: #666;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .input-wrap {
        margin-bottom: 20px;
    }

    .input-wrap label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .input-wrap input {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .input-wrap input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #555;
        cursor: pointer;
    }

    .remember input {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .forgot {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .forgot:hover {
        color: #764ba2;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .register-text {
        text-align: center;
        margin-top: 20px;
        color: #666;
        font-size: 14px;
    }

    .register-text a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
    }

    .register-text a:hover {
        text-decoration: underline;
    }

    .hero-side {
        flex: 1;
        max-width: 600px;
        color: white;
    }

    .hero-content h1 {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 30px;
        opacity: 0.95;
    }

    .hero-img {
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 1024px) {
        .hero-side {
            display: none;
        }

        .login-card {
            margin-right: 0;
            max-width: 500px;
        }
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 35px 25px;
        }

        .header h2 {
            font-size: 26px;
        }
    }
</style>
@endpush
</style>
@endpush
