@extends('templates.edit')
@section('form_content')
    @include('admin.listings.form', [
                            'item' =>$item,
                            'features' => json_decode($item->features, true)
                        ])
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
            $('.file-section').append(`<span class=" bg-light h4 file-message">${numFiles == 1 ? "1 Image" : numFiles + " Images"} Uploaded</span>`);
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
                        url: "{{route('admin.listings.image.delete')}}",
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

        $(document).on('click', '.btn-submit', function (e) {
            e.preventDefault();
            let valid = true;
            $(document).find('input, select').each(function () {
                if ($(this).prop('required')) {
                    if (!$(this).val()) {
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
            if (valid) {
                $('#form').submit();
            }
        });
        checkType();
        $(document).on('change', '#type', function () {
            checkType()
        })

        $(document).on('change', '#purpose', function () {
            checkPurpose()
        })

        function checkType()
        {
            let val = $('#type').val();
            if(val == "Land")
            {
                $('#bedroomLabel').css('display', 'none');
                $('#bedroom').val('');
                $('#bathroomLabel').css('display', 'none');
                $('#bathroom').val('');
                $('#no_of_storiesLabel').css('display', 'none');
                $('#no_of_stories').val('');
                $('#livingroomLabel').css('display', 'none');
                $('#livingroom').val('');
                $('#kitchenLabel').css('display', 'none');
                $('#kitchen').val('');
                $('#road_widthLabel').css('display', 'none');
                $('#road_width').val('');
                $('#parkingLabel').css('display', 'none');
                $('#parking').val('');
            }
            else{
                $('#bedroomLabel').show();
                $('#bathroomLabel').show();
                $('#no_of_storiesLabel').show();
                $('#livingroomLabel').show();
                $('#kitchenLabel').show();
                $('#road_widthLabel').show();
                $('#parkingLabel').show();

            }
        }

        function checkPurpose()
        {
            let val = $('#purpose').val();
            if(val == "sale")
            {
                $('#durationLabel').css('display', 'none');
                $('#duration').val('');
                $('#rent_dateLabel').css('display', 'none');
                $('#rent_date').val('');
            }
            else{
                $('#rent_dateLabel').show();
                $('#durationLabel').show();
            }
        }

    </script>
@endpush
