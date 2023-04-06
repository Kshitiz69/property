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

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif
<div class="container1">
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-6">
        <div class="card1">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
                <form action="{{ $register_url }}" method="post">
                    @csrf
                    {{--                     Name field --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}"
                                   autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    {{--                     Email field --}}

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    {{--                     Phone field --}}
                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}" placeholder="{{ __('adminlte::adminlte.phone') }}">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    {{--                     Address field --}}

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="address"
                                   class="form-control @error('address') is-invalid @enderror"
                                   value="{{ old('address') }}" placeholder="{{ __('adminlte::adminlte.address') }}">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    {{--                     Password field --}}
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="{{ __('adminlte::adminlte.password') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{--                     Confirm password field --}}

                    <div class="row mb-3">
                        <label for="password_confirmation"
                               class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input type="password" name="password_confirmation"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{--                     Register button --}}
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit"
                                    class="btn btn-light">
                                {{ __('adminlte::adminlte.register') }}
                            </button>
                        </div>
                    </div>

                    <p class="my-0">
                            <a class="text-light" href="{{ $login_url }}">
                                {{ __('adminlte::adminlte.i_already_have_a_membership') }}
                            </a>
                        </p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
{{--@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])--}}

{{--@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )--}}
{{--@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )--}}

{{--@if (config('adminlte.use_route_url', false))--}}
{{--    @php( $login_url = $login_url ? route($login_url) : '' )--}}
{{--    @php( $register_url = $register_url ? route($register_url) : '' )--}}
{{--@else--}}
{{--    @php( $login_url = $login_url ? url($login_url) : '' )--}}
{{--    @php( $register_url = $register_url ? url($register_url) : '' )--}}
{{--@endif--}}

{{--@section('auth_header', __('adminlte::adminlte.register_message'))--}}

{{--@section('auth_body')--}}
{{--    <form action="{{ $register_url }}" method="post">--}}
{{--        @csrf--}}
{{--         Name field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"--}}
{{--                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('name')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        --}}{{-- Email field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"--}}
{{--                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">--}}

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

{{--        --}}{{-- Phone field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"--}}
{{--                   value="{{ old('phone') }}" placeholder="{{ __('adminlte::adminlte.phone') }}">--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('phone')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        --}}{{-- Address field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"--}}
{{--                   value="{{ old('address') }}" placeholder="{{ __('adminlte::adminlte.address') }}">--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('address')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
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

{{--        --}}{{-- Confirm password field --}}
{{--        <div class="input-group mb-3">--}}
{{--            <input type="password" name="password_confirmation"--}}
{{--                   class="form-control @error('password_confirmation') is-invalid @enderror"--}}
{{--                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">--}}

{{--            <div class="input-group-append">--}}
{{--                <div class="input-group-text">--}}
{{--                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @error('password_confirmation')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        --}}{{-- Register button --}}
{{--        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">--}}
{{--            <span class="fas fa-user-plus"></span>--}}
{{--            {{ __('adminlte::adminlte.register') }}--}}
{{--        </button>--}}

{{--    </form>--}}
{{--@stop--}}

{{--@section('auth_footer')--}}
{{--    <p class="my-0">--}}
{{--        <a href="{{ $login_url }}">--}}
{{--            {{ __('adminlte::adminlte.i_already_have_a_membership') }}--}}
{{--        </a>--}}
{{--    </p>--}}
{{--@stop--}}
