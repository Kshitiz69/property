@extends('frontend.layouts.main')
@section('main-container')
    <section class="intro-single">
        <div class="container mt-3">
            <div class="row py-4">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Favorites</h1>
                    </div>
                </div>
                <div class="row">
{{--                    {{dd($favorites)}}--}}
                    @if($favorites->isNotEmpty())
                    @foreach ($favorites ?? [] as $item)
                        <div class="col-md-4 my-2">
                            <div class="carousel-item-b">
                                <div class="img-box-a" style="position: relative">
                                    @if($item->listing->photo_url !== null)
                                        <img src="{{$item->listing->photo_url[0]}}" alt="Property Image"
                                             class="img-a img-fluid thumbnail" style="width:100%;height:350px;object-fit: cover">
                                    @else
                                        <img src="{{asset('img/download.png')}}" alt="Property Image"
                                             class="img-a img-fluid thumbnail" style="width:100%;height:350px;object-fit: cover;object-fit: cover">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <h5 class="card-header-a">
                                        <a href="{{route($route.'show', $item->listing->id)}}">{{$item->listing->title}}
                                            <br/> </a>
                                    </h5>
                                    <h4>Rs:{{$item->listing->price}}</h4>
                                </div>
                                <div class="card-tag">
                                    @if($item->features && json_decode($item->features)->type == "Home")
                                        <span>{{json_decode($item->listing->features)->bedroom}}</span>
                                        <span>Bed</span> |
                                        <span>{{json_decode($item->listing->features)->bathroom}}</span>
                                        <span>Baths</span> |
                                    @endif
                                    <span>{{json_decode($item->listing->features)->area}} m<sup>2</sup></span>
                                    <span>Area</span>

                                </div>
                                <span>Type: {{ json_decode($item->listing->features)?json_decode($item->listing->features)->type ?:'N/A':'N/A'}}</span><p class="" style="margin: 0.5rem 0">{{$item->listing->description? Str::limit($item->listing->description, 40) :'N/A'}}</p>
                                <a href="{{route($route.'show', $item->listing->id)}}" class="btn btn-secondary ">Read More</a>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="alert alert-info mt-5">
                        <h4>There are no saved items or content to your Favorites section.</h4>
                        <p>To add items to your "Favorites" section, simply navigate to the item and tap the <i class="fas fa-heart" style="color: #fa0000"></i> button.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
