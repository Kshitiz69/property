@extends('frontend.layouts.main')
@section('main-container')


<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('frontend/img/slide-1.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <h1 class="intro-title mb-4">Discover Your
                                        <span class="color-b">Perfect property</span>
                                        <br>With Us</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('frontend/img/slide-2.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <h1 class="intro-title mb-4">Your
                                        <span class="color-b">Next Home</span>
                                        <br>Is Just A Click Away </h1>
                                    <p class="intro-subtitle intro-price">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ asset('frontend/img/slide-3.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">
                                    <h1 class="intro-title mb-4">The Best
                                        <span class="color-b">Properties</span>
                                        <br>All In One Place</h1>
                                    <p class="intro-subtitle intro-price">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Carousel end /-->

<!--/ Services Star /-->
<section class="section-services section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">Our Services</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c ">
                        <div class="card-box-ico">
                            <span class="fa fa-home"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Buy</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                            Find your dream home on our platform. Browse a wide variety of properties and filter your search based on your preferences. Contact the seller directly and close the deal without any broker fees.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        {{-- <a href="#" class="link-c link-icon">Read more
                          <span class="ion-ios-arrow-forward"></span>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c ">
                        <div class="card-box-ico">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Rent</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                            Rent out your property on our platform and connect with potential tenants directly. Manage your rental property on your own terms, from advertising your property to screening tenants. Our platform makes it easy to find the right tenant for your property.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        {{-- <a href="#" class="link-c link-icon">Read more
                          <span class="ion-ios-arrow-forward"></span>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box-c foo">
                    <div class="card-header-c ">
                        <div class="card-box-ico">
                            <span class="fa fa-home"></span>
                        </div>
                        <div class="card-title-c align-self-center">
                            <h2 class="title-c">Sell</h2>
                        </div>
                    </div>
                    <div class="card-body-c">
                        <p class="content-c">
                            List your property on our platform and reach thousands of potential buyers. Our broker-free service allows you to sell your home at the price you want, without any hidden fees. Create your listing, upload pictures and start selling today.
                        </p>
                    </div>
                    <div class="card-footer-c">
                        {{-- <a href="#" class="link-c link-icon">Read more
                          <span class="ion-ios-arrow-forward"></span>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Services End /-->

<!--/ property Star /-->
<section class="section-property section-t8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-wrap d-flex justify-content-between">
                    <div class="title-box">
                        <h2 class="title-a">Latest Properties</h2>
                    </div>
                    <div class="title-link">
                        <a href="{{route('properties.index')}}">All property
                            <span class="ion-ios-arrow-forward"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
            @foreach($item as $item)
                <div class="carousel-item-b">
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
    </div>
</section>
@endsection


