@extends('frontend.layouts.main')
@section('main-container')
    <section class="form-container ">
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <div class="col-md-12 col-lg-20">
                    <h2 class="mb-3">Rent Property Details</h2><br>
                    <form method="POST" id="form" enctype="multipart/form-data" action="{{route($route.'store')}}">
                        @csrf
                        @include('user.mrental.form', ['item'=>null])

{{--                        <div class="form-group">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input " type="checkbox" value="" id="invalidCheck3" required >--}}
{{--                                <label class="form-check-label" for="invalidCheck3">--}}
{{--                                    Agree to terms and conditions--}}
{{--                                </label>--}}
{{--                                <div class="">--}}
{{--                                    You must agree before submitting.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button class="btn btn-primary btn-submit" type="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!--/ Intro Single End /-->
@endsection
@push('scripts')
    <script>
        $(document).on('click', '#file-upload', function (e) {
            e.preventDefault();
            $('#file-upload-hidden').trigger('click');
        });
        $('#file-upload-hidden').on('change', function () {
            var numFiles = $("#file-upload-hidden")[0].files.length;
            $('.file-section > .file-message').html('');
            $('.file-section').append(`<span class=" bg-light h4 file-message">${numFiles ==1 ? "1 Image": numFiles+" Images"} Uploaded</span>`);
        });
        $(document).on('click', '.btn-submit', function (e) {
            e.preventDefault();
            let valid = true;
            $(document).find('input, select').each(function () {
                if($(this).prop('required'))
                {
                    if(!$(this).val()){
                        $(this).parent().find('span.validation').remove();
                        $(this).parent().append(`<span class="text-danger validation">This field is required</span>`);
                        valid = false;
                        // Focus on the input field
                        $(this).focus();
                        // Exit the loop to prevent focusing on other input fields
                        return false;
                    }
                }

            })
            $(document).on('keyup change', 'input, select', function () {
                $(this).parent().find('span.validation').remove();
            });
            if(valid)
            {
                $('#form').submit();
            }
        })

    </script>
@endpush
