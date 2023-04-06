@extends('frontend.layouts.header')
@push('styles')
    <style>
        /* enable absolute positioning */
        .inner-addon {
            position: relative;
        }

        /* style icon */
        .inner-addon .fas {
            position: absolute;
            padding: 10px;
            pointer-events: none;
        }

        /* align icon */
        .left-addon .fas {
            left: 0px;
        }

        .right-addon .fas {
            right: 0px;
        }

        /* add padding  */
        .left-addon input {
            padding-left: 30px;
        }

        .right-addon input {
            padding-right: 30px;
        }

        .buy_section {

            height: 100vh;
            overflow: hidden;

        }

        .property-list_section {

            overflow-x: hidden;
            overflow-y: scroll;
            height: 70vh;

        }

        @media screen and (max-width: 756px) {

            .buy_section {

                height: auto;

            }

            .property-list_section {

                overflow: auto;
                height: auto;

            }

        }
        #locations{
            background: white!important; position: absolute; top: 60px; width: 100%; z-index: 99; overflow-y: scroll; max-height: 50vh;
        }
        #listValue{
            list-style-type:none;
            margin-left: -2rem !important;
            padding: .5rem 1rem;
            border-bottom: 1px solid #e6e6e6;

        }

    </style>
@endpush

@section('content')
    <section class="buy_section">
        <!--/ Intro Single star /-->
        <section class="intro-single" style="padding: 2.2rem; ">

        </section>
        <div>
            <div class="container-fluid bg-light m-0 py-2">
                <div class="row">
                    <form class="rent-filter">
                        <div class="form-group">
                            <div class="input-group inner-addon right-addon form-floating">
                                <input type="text" class="form-control location" placeholder="Location" list="locations"
                                       value="Pokhara, Kaski, Gandaki Pradesh, Nepal" id="floatingInput"
                                       data-lat="28.209538" data-lon="83.991402" style="position:relative;">
                                <ul id="locations">
                                </ul>
                                <span><i class="fas fa-search"></i></span>
                                <label for="floatingInput">Location</label>
                            </div>
                        </div>
                        <div class="form-group form-floating">
                            <select class="form-control form-select custom-select type" id="floatingSelect">
                                <option value="{{null}}">All</option>
                                <option value="Home">House</option>
                                <option value="Land">Land</option>
                            </select>
                            <label for="floatingSelect">Type</label>

                        </div>

                        <div class="form-group form-floating">
                            <select class="form-control custom-select form-select purpose" id="floatingSelect">
                                <option value="rent">For Rent</option>
                                <option value="sale">For Sale</option>
                            </select>
                            <label for="floatingSelect">Purpose</label>
                        </div>

                        <div class="form-group form-floating">
                            <select class="form-control custom-select form-select price" id="floatingSelect">
                                <option value="">All</option>
                                @foreach(config('price-range.price') as $price)
                                    <option>{{$price}}</option>
                                @endforeach

                            </select>
                            <label for="floatingSelect">Price Range</label>

                        </div>
                        <button class="searchbtn btn btn-primary" type="button">Search</button>
                    </form>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div style="z-index: 1">
                                <input type="hidden" value='@json($listings)' id="listings">
                                <div id="map" style="height: 60vh;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 property-list_section" style="">
                        <section class="property-grid grid">
                            <div class="container">
                                {{--                            {{dd($listings)}}--}}
                                {{--                            <input type="hidden" value='@json($favorites)' id="as">--}}
                                <div class="row properties">
                                    @if($listings->isNotEmpty())
                                        @foreach ($listings ?? [] as $item)
                                            <div class="col-md-6 mt-2">
                                                <div class="card card-box-rs h-100 m-0 p-0">

                                                    <div class="img">
                                                        <div id="myCarousel" class="carousel slide"
                                                             data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                @foreach($item->photo_url ?? [] as $photo)
                                                                    <div class="carousel-item active">
                                                                        <img src="{{$photo }}" class="d-block w-100"
                                                                             alt="..."
                                                                             style="height: 150px; object-fit: cover;border-radius: 15px 15px 0 0;">
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="card-body mb-0 pb-0">
                                                        <p class="text-sm font-weight-bold m-0 p-0">
                                                            Rs. {{ $item->price }}</p>
                                                        <p class="text-sm m-0 p-0">
                                                            Type: {{ json_decode($item->features)->type}}</p>
                                                        @if(json_decode($item->features)->type == 'Home' )
                                                            <p class="text-xs m-0 p-0"><span
                                                                    class="font-weight-bold"> {{ json_decode($item->features)->bedroom }}</span>
                                                                beds | <span
                                                                    class="font-weight-bold">{{ json_decode($item->features)->bathroom }}</span>baths
                                                                | <span
                                                                    class="font-weight-bold">{{ json_decode($item->features)->area }}</span>m<sup>2</sup>
                                                            </p>
                                                        @endif
                                                        <p class="text-xs m-0 p-0">{{ explode(',', $item->location)[0] . ','. explode(',', $item->location)[1]. ','. explode(',', $item->location)[3]}} </p>
                                                    </div>
                                                    <div class="footer mx-3 mb-3 mt-0 d-flex justify-content-between">
                                                        <div class="d-inline-flex float-left text-xs my-3">
                                                            <a href="{{route('listings.show', $item->id)}}" class="btn btn-primary">Click here</a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            @if(auth()->user())
                                                                <form action="{{route('favorite.store')}}" method="GET">
                                                                    <input type="hidden" id="favHidden" name="favorite">
                                                                </form>
                                                                <?php
                                                                $favourite = \App\Models\Favorite::where(['user_id' => auth()->user()->id, 'listing_id' => $item->id])->first();
                                                                ?>
                                                                <i class="{{$favourite?'fa-solid fa-heart fa-xl favorite' : 'fa-regular fa-heart fa-xl favorite'}}"
                                                                   data-value="{{$item->id}}"
                                                                   style="color: #fa0000;"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">
                                            <h4>No data is available for this search</h4>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@push('scripts')
    <script>
        const location23 = $('.location').val();
        const api_url =
            "https://nominatim.openstreetmap.org/search.php?city=" + location23 + "&format=jsonv2";

        $('.location').on('keyup', function () {
            const url = "https://nominatim.openstreetmap.org/search.php?city=" + $(this).val() + "&format=jsonv2";
            $(this).next().empty();
            getapi(url).then((data) => {
                data.forEach(function (item) {
                    $('.location').next().append(`<li id="listValue" data-lat="${item.lat}" data-lon="${item.lon}" data-name="${item.display_name}">${item.display_name}</li>`);
                });
            });


        });
        $(document).on('click', '#listValue', function () {
            $('.location').val($(this).data('name'));
            $('.location').data('lat', $(this).data('lat'));
            $('.location').data('lon', $(this).data('lon'));
            $('#locations').empty();
        })

        var map = L.map('map');


        addMap(JSON.parse($('#listings').val()));
        $(document).on('click', '.searchbtn', function () {
            let latitude = $('.location').data('lat');
            let longitude = $('.location').data('lon');
            let price = $('.price').val();
            let type = $('.type').val();
            let purpose = $('.purpose').val();

            $.ajax({
                url: "{{route('buy.index')}}",
                type: 'GET',
                data: {
                    'latitude': latitude,
                    'longitude': longitude,
                    'price': price,
                    'type': type,
                    'purpose': purpose,
                },
                success: function (data) {

                    $('.properties').empty();
                    let fav = [];
                    if (data.listings.length == 0) {
                        $('.properties').append(`
                            <div class="alert alert-info">
                                <h4>No data is available for this search</h4>
                            </div>
                        `);
                    } else {
                        data.favorites.forEach(function (item) {
                            fav.push(item);
                        })
                        // console.log(fav);
                        let html = '';
                        $('#listings').remove();
                        data.listings.forEach(function (item, index) {
                            let photos = '';
                            item.photo_url.forEach(function (photo) {
                                photos += `
                                <div class="carousel-item active">
                                    <img src="${photo}" class="d-block w-100" alt="..." style="height: 150px; object-fit: cover; border-radius: 15px 15px 0 0;">
                                </div>;`
                            })
                            let features = '';
                            console.log(JSON.parse(item.features).type)
                            if (JSON.parse(item.features).type == 'Home')
                            {
                                features += `<p class="text-xs m-0 p-0">

                                 <span class="font-weight-bold"> ${ (JSON.parse(item.features).bedroom ) ?? 'N/a'} </span>
                                                            beds | <span
                                        class="font-weight-bold">${ (JSON.parse(item.features).bathroom ) ?? 'N/a'}</span>baths
                                                            | <span
                                                                class="font-weight-bold">${ (JSON.parse(item.features).area ) ?? 'N/a'}</span>m<sup>2</sup>
                                                        </p>`;
                            }
                            let url = "{{route('listings.show', 'id')}}";
                            let route = url.replace('id', item.id);
                            let favs = fav.includes(item.id);

                            html += `
                            <div class="col-md-6 mt-2">
                                <div class="card card-box-rs h-100 m-0 p-0">
                                    <div class="img">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                   ${photos}
                            </div>

                            </div>
                            </div>
                            <div class="card-body mb-0 pb-0">
                                <p class="text-sm font-weight-bold m-0 p-0">Rs. ${item.price}</p>
                                <p class="text-sm m-0 p-0">
                                                            Type: ${ JSON.parse(item.features).type}</p>
                                 ${features}
                                                    <p class="text-xs m-0 p-0">${item.location.split(',')[0] + ',' + item.location.split(',')[1] + ',' + item.location.split(',')[3]} </p>
                                                </div>
                                                <div class="footer mx-3 mb-3 mt-0 d-flex justify-content-between">
                                                    <div class="d-inline-flex float-left text-xs my-3">
                                                        <a href="${route}" class="btn btn-primary">Click here</a>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                        @if(auth()->user())

                            <i class="${favs == true ? 'fa-solid fa-heart fa-xl favorite ' : 'fa-regular fa-heart fa-xl favorite'}" data-value="${item.id}" style="color: #fa0000;"></i>
                                                        @endif
                            </div>

                        </div>
                    </div>
                </div>
`
                        })
                        $('.properties').append(html);
                    }
                    addMap(data.listings);


                }
            })
                .done(function (data) {

                });
        });

        $('.properties').on('click', '.favorite', function () {
            $.ajax({
                url: "{{route('favorite.store')}}",
                type: 'GET',
                data: {
                    'favorite': $(this).data('value')
                },
                success: function (data) {
                    $(document).find('.favorite').each(function () {
                        if ($(this).data('value') == data.listing_id) {
                            if ($(this).hasClass('fa-solid')) {
                                $(this).removeClass('fa-solid').addClass('fa-regular');
                            } else if ($(this).hasClass('fa-regular')) {
                                $(this).addClass('fa-solid').removeClass('fa-regular');

                            }
                        }
                    })
                    // $(document).find('.favorite').load(location.href+" .favorite>*","");
                }
            })
            // $(this).prev().submit();
        })

        // Defining async function
        async function getapi(url) {

            // Storing response
            const response = await fetch(url);

            // Storing data in form of JSON
            return await response.json();


        }

        function addMap(properties) {
            // Remove all existing layers from the map
            map.eachLayer(function (layer) {
                map.removeLayer(layer);
            });
            var lat = ($('.location').data('lat'));
            var lon = ($('.location').data('lon'));
            map.setView([lat, lon], 11, {
                "animate": true,
                "pan": {
                    "duration": 3
                }
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);
            console.log(properties);
            properties.forEach(function (item, index) {
                L.marker([item.latitude, item.longitude])
                    .bindPopup(`
                        <div class="popup-content"><h6>${item.title}</h6><p>Rs. ${item.price}</p><p>${item.location}</p></div>`, {
                        autoClose: false,
                        closeOnClick: false
                    })
                    .on('mouseover', function (e) {
                        this.openPopup();
                    })
                    .on('mouseout', function (e) {
                        this.closePopup();
                    })
                    .addTo(map);
                // L.circle([item.latitude, item.longitude], 500).addTo(map);
            });
        }


    </script>
@endpush
