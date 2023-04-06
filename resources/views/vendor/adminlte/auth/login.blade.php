<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- GoogleFonts -->
    <link href=https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootst CSS File -->
    <link href={{url ("frontend/lib/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Library CSS Files -->
    <link href={{url ("frontend/lib/font-awesome/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{url ("frontend/lib/animate/animate.min.css")}} rel="stylesheet">
    {{-- <link href={{url ("frontend/lib/ionicons/css/ionicons.min.css")}} rel="stylesheet"> --}}
    <link href={{url ("frontend/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href={{url("frontend/css/style.css")}} rel="stylesheet">

</head>

<body>
<style>

    .container1 {
        background-image: url('frontend/img/slide-1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card1 {
        background-color: #2eca6ad3;
        color: black;
        width: 90%;
    }
</style>
@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif
<div class="container1">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-6">
        <div class="card1">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-4">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control login @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control login @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-light">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row justify-content-between">
                    @if($password_reset_url)

                        {{--                            @if (Route::has('password.request'))--}}
                        <a class="btn text-light" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    @if($register_url)
                        <p class="my-0">
                            <a class="btn btn-xs text-light text-xs" href="{{ $register_url }}" >
                                {{ __('adminlte::adminlte.register_a_new_membership') }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

{{--@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])--}}

{{--@section('adminlte_css_pre')--}}
{{--    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">--}}
{{--@stop--}}

{{--@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )--}}
{{--@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )--}}
{{--@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )--}}

{{--@if (config('adminlte.use_route_url', false))--}}
{{--    @php( $login_url = $login_url ? route($login_url) : '' )--}}
{{--    @php( $register_url = $register_url ? route($register_url) : '' )--}}
{{--    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )--}}
{{--@else--}}
{{--    @php( $login_url = $login_url ? url($login_url) : '' )--}}
{{--    @php( $register_url = $register_url ? url($register_url) : '' )--}}
{{--    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )--}}
{{--@endif--}}

{{--@section('auth_header', __('adminlte::adminlte.login_message'))--}}

{{--@section('auth_body')--}}
{{--    <form method="post" action="{{ route('login-redirect') }}">--}}
{{--        @csrf--}}
{{--        --}}{{-- Email field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"--}}
{{--                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        --}}{{-- Password field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"--}}
{{--                   placeholder="{{ __('adminlte::adminlte.password') }}">--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('password')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        --}}{{-- Login field --}}
{{--        <div class="row">--}}
{{--            <div class="col-7">--}}
{{--                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">--}}
{{--                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                    <label for="remember">--}}
{{--                        {{ __('adminlte::adminlte.remember_me') }}--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-5">--}}
{{--                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">--}}
{{--                    <span class="fas fa-sign-in-alt"></span>--}}
{{--                    {{ __('adminlte::adminlte.sign_in') }}--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </form>--}}
{{--@stop--}}

{{--@section('auth_footer')--}}
{{--    --}}{{-- Password reset link --}}
{{--    @if($password_reset_url)--}}
{{--        <p class="my-0">--}}
{{--            <a href="{{ $password_reset_url }}">--}}
{{--                {{ __('adminlte::adminlte.i_forgot_my_password') }}--}}
{{--            </a>--}}
{{--        </p>--}}
{{--    @endif--}}

{{--    --}}{{-- Register link --}}
{{--    @if($register_url)--}}
{{--        <p class="my-0">--}}
{{--            <a href="{{ $register_url }}">--}}
{{--                {{ __('adminlte::adminlte.register_a_new_membership') }}--}}
{{--            </a>--}}
{{--        </p>--}}
{{--    @endif--}}
{{--@stop--}}
