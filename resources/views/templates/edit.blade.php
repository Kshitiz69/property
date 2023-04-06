@extends('adminlte::page')


@section('title', 'Edit '.$title)

@section('content_header')
    <h1>Edit {{$title}}</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" action="{{route($route.'update',$item->id)}}"
                              method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                @endif
                                @yield('form_content')

                            </div>

                            <div class="card-footer">
                                <button type="submit" id="button_submit" class="btn btn-primary">Submit</button>
                                <a href="javascript:history.back();" class="btn btn-default float-right">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('css')
    @stack('styles')
@stop
@section('js')
    @yield('ext_js')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
@endsection
