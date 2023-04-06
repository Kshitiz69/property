@extends('frontend.layouts.main')
@section('main-container')

  <!--/ Intro Single star /-->
  <section class="intro-single">
      <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
          @foreach($item->getMedia('listings') ?? [] as $image)

              <div class="carousel-item-b text-center" style="position: relative;">
                  <img src="{{ $image->getFullUrl() }}" alt="Property Image"
                       style="height: 80vh; width:100%; object-fit:cover">
{{--                  @if($item->title || $item->location)--}}
{{--                      <div class="" style="position: absolute;top: 50%;left: 30%;background: #2ECA6A;color: #ffffff;padding: 0.5rem 2rem;">--}}
{{--                          <h1 class="title-single">{{$item->Title}}</h1>--}}
{{--                          <h1 class="title-single">{{$item->location ? explode(',', $item->location)[1]:''}}</h1>--}}
{{--                      </div>--}}
{{--                  @endif--}}
              </div>
          @endforeach
      </div>
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-8 d-flex ">
                  <div class="title-single-box">
                      <h2>Price: Rs {{$item->price}}</h2>
                  </div>
              </div>

          </div>
      </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              @foreach($item->getMedia('listings') ?? [] as $image)

            <div class="carousel-item-b text-center">
              <img src="{{ $image->getFullUrl() }}" alt="Property Image" style="height: 500px; width:400px; object-fit:cover">
            </div>
              @endforeach
          </div>
          <div class="row justify-content-between">
              <div class="row pt-4">
                  <div class="col-sm-12">
                      <div class="title-box-d">
                          <h3 class="title-d">Property Description</h3>
                      </div>
                  </div>
              </div>
              <div class="property-description">
                  <p class="description color-text-a">
                      {{$item->description?:'N/A'}}
                  </p>
              </div>
            <div class="col-md-5 col-lg-5">
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Property Details</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Property Type:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->type ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->area ?:'N/A':'N/A'}} m
                        <sup>2</sup>
                      </span>
                    </li>
                      @if($item->features && json_decode($item->features)->type == 'Home')
                      <li class="d-flex justify-content-between">
                      <strong>Beds:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->bedroom ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Baths:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->bathroom ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Livingroom:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->livingroom ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kitchen:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->kitchen ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Parking:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->parking ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Road width:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->road_width ?:'N/A':'N/A'}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Number of storeys:</strong>
                      <span>{{json_decode($item->features)?json_decode($item->features)->no_of_stories ?:'N/A':'N/A'}}</span>
                    </li>
                  @endif
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3 pt-3">

              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Address</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a">
                <li><strong>Location: </strong>{{$item->location?:'N/A'}}</li>
                <li><strong>Latitude: </strong>{{$item->latitude?:'N/A'}}</li>
                <li><strong>Longitude: </strong>{{$item->longitude?:'N/A'}}</li>
                </ul>
              </div>
               <style>
                 .list{
                   line-height: 2
                 }
               </style>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                aria-selected="false">Ubication</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link " id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                     aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                     aria-selected="false">Floor Plans</a>
              </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
             <div class="tab-pane fade " id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                 @if($item->getImage('video'))
              <iframe src="{{$item->getImage('video')}}" width="100%" height="460" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                     @endif
            </div>
            <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
              <img src="img/plan2.jpg" alt="" class="img-fluid">
            </div>
            <div class="tab-pane fade active show" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <div id="map" style="height: 280px;"></div>
                <script>

                    var latitude = "{{$item->latitude}}";
                    var longitude = "{{$item->longitude}}";
                    let proplocation = "{{explode(',', $item->location)[0]}}";
                    var map = L.map('map');
                    map.setView([latitude, longitude], 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                        maxZoom:18,
                    }).addTo(map);
                    L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(proplocation)
                        .openPopup();
                </script>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->
  @endsection
