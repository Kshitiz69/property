@extends('frontend.layouts.main')
@section('main-container')
    <section class="form-container ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-20">
                    <h2 class="mb-3">Rent Property Details</h2><br>
                    <form method="POST"  enctype="multipart/form-data" action="{{route('listings.update', $item->id)}}">
                        @csrf
                        @method('PUT')
                        @include('admin.listings.form', [
                            'item' =>$item,
                            'features' => json_decode($item->features, true)
                        ])

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
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!--/ Intro Single End /-->
@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


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
        $(document).on('click', '.deleteFile', function (e) {
            e.preventDefault();
            let del = confirm('Are You Sure?');
            if (del) {
                model_id = $(this).attr('data-model-id');
                dataId = $(this).attr('data-id');
                parentDiv = $(this).parents('.file-row');

                // console.log(model_id, dataId, parentDiv);

                if (model_id && dataId) {
                    $.ajax({
                        type: 'GET',
                        url: "{{route('listings.image.delete')}}",
                        data: {
                            id: dataId,
                        },
                        error: function (xhr) {
                            showFailedMessage();
                        }
                    }).done(function (response) {
                        if (response.status) {
                            showSuccessMessage(response.message);
                            $(parentDiv).remove();
                        } else {
                            showFailedMessage();
                        }
                    })
                } else {
                    showFailedMessage();
                }
            }
        });
        function showSuccessMessage(message) {
            $('#message').append(`<div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            ${message}
            </div>`)
        }

        function showFailedMessage(error_message) {
            $('#message').append(`<div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            ${message}
            </div>`)
        }
    </script>
@endpush
