@extends('frontend.layouts.header')
@section('content')
    @yield('main-container')
    @include('frontend.layouts.footer')

@endsection
@push('scripts')
    <script>
        checkType();
        $(document).on('change', '#type', function () {
            checkType()
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
                $('#durationLabel').css('display', 'none');
                $('#duration').val('');
                $('#rent_dateLabel').css('display', 'none');
                $('#rent_date').val('');
            }
            else{
                $('#bedroomLabel').show();
                $('#bathroomLabel').show();
                $('#no_of_storiesLabel').show();
                $('#livingroomLabel').show();
                $('#kitchenLabel').show();
                $('#road_widthLabel').show();
                $('#parkingLabel').show();
                $('#rent_dateLabel').show();
                $('#durationLabel').show();
            }
        }
    </script>
@endpush
