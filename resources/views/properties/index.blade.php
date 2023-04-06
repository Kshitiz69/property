@extends('frontend.layouts.main')
@section('main-container')
    <section class="intro-single">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 col-lg-20">
                    <div class="title-single-box mb-5">
                        <h1 class="title-single">All Properties</h1>
                    </div>
                    <div class="row">
                        @foreach($listings as $item)
                            <div class="col-md-4 my-2">
                                <span class="badge" style="background: #2ECA6A;padding: 0.5rem 1rem;z-index: 2;position: absolute;top:0;left: 0;">Sale</span>
                                <div class="img-box-a" style="position: relative">
                                    <img src={{$item->photo_url ? $item->photo_url[0]:''}} alt="Image" class="img-a img-fluid" style="width: 100%;height: 250px;object-fit: cover;">
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <h5 class="card-header-a">
                                        <a href="{{route('listings.show', $item->id)}}">{{$item->title}}</a>
                                    </h5>
                                    <h4>Rs:{{$item->price}}</h4>
                                </div>
                                <div class="card-tag">
                                    @if($item->features && json_decode($item->features)->type == "Home")
                                        <span>{{json_decode($item->features)->bedroom ?:'N/a'}}</span>
                                        <span>Bed</span> |
                                        <span>{{json_decode($item->features)->bathroom ?:'N/a'}}</span>
                                        <span>Baths</span> |
                                    @endif
                                    <span>{{json_decode($item->features)->area ?:'N/a'}} m <sup>2</sup></span>
                                    <span>Area</span>

                                </div>
                                <span>Type: {{json_decode($item->features)->type}}</span><p class="" style="margin: 0.5rem 0">{{$item->description? Str::limit($item->description, 40):'N/A'}}</p>
                                <a href="{{route('listings.show', $item->id)}}" class="btn btn-secondary ">Read More</a>
                            </div>
                        @endforeach

                    </div>

{{--                    <div class="row">--}}
{{--                        @foreach ($listings as $item)--}}
{{--                            <div class="col-md-4 my-2">--}}
{{--                                <div class="card-box-a card-shadow">--}}
{{--                                    <h4><span class="badge text-bg-warning text-white text-lg" style="position: absolute;">For {{ ucfirst(trans($item->type))}}</span></h4>--}}
{{--                                    <div class="img-box-a" style="height: 53vh">--}}
{{--                                        @if($item->photo_url)--}}
{{--                                            <img src="{{$item->photo_url[0]}}"--}}
{{--                                                 alt="Property Image"--}}
{{--                                                 class="img-a img-fluid thumbnail" style="object-fit: cover">--}}
{{--                                        @else--}}
{{--                                            <img src="{{asset('img/download.png')}}" alt="Property Image"--}}
{{--                                                 class="img-a img-fluid thumbnail" style="object-fit: cover">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="card-overlay">--}}
{{--                                        <div class="card-overlay-a-content">--}}
{{--                                            <div class="card-header-a">--}}
{{--                                                <h4 class="card-title-a text-sm">--}}
{{--                                                    <a href="{{route('listings.show', $item->id)}}">{{$item->title}}--}}
{{--                                                        <br/> </a>--}}
{{--                                                </h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body-a">--}}
{{--                                                <div class="price-box d-flex">--}}
{{--                                                    <span class="price-a">Price | Rs {{$item->price}}</span>--}}
{{--                                                </div>--}}
{{--                                                <a href="{{route('listings.show', $item->id)}}" class="link-a mr-2">Click--}}
{{--                                                    here to--}}
{{--                                                    view--}}
{{--                                                    <span class="ion-ios-arrow-forward"></span>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-footer-a">--}}
{{--                                                <ul class="card-info d-flex justify-content-around">--}}
{{--                                                    <li>--}}
{{--                                                        <h4 class="card-info-title">Area</h4>--}}
{{--                                                        {{json_decode($item->features)->area}}--}}
{{--                                                        <span> m--}}
{{--                                                    <sup>2</sup>--}}
{{--                                                  </span>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <h4 class="card-info-title">Beds</h4>--}}
{{--                                                        <span>{{json_decode($item->features)->bedroom}}</span>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <h4 class="card-info-title">Baths</h4>--}}
{{--                                                        <span>{{json_decode($item->features)->bathroom}}</span>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

@endsection
