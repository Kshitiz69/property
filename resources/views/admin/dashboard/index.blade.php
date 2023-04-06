@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __(auth()->user()->name .', You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
