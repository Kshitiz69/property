@extends('frontend.layouts.main')
@push('styles')
    <style>
        a
        {
            text-decoration: none;
        }
    </style>
    @endpush
@section('main-container')
    <section class="intro-single">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-12 col-lg-20">
                    <div class="title-single-box mb-5">
                        <h1 class="title-single">Rental Property Listings</h1>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                    <div class="add">
                        <h4><a href="{{route($route.'create')}}"><i class="fa-solid fa-circle-plus addIcon"></i>
                                Add a property</a></h4>
                    </div>
                    <div class="row">
                        @if($listings->isNotEmpty())
                        @foreach ($listings as $item)
                            <div class="col-md-4 my-2">
                                <div class="carousel-item-b">
                                    <div class="img-box-a" >
                                        @if($item->getMedia('listings')->isNotEmpty())
                                            <img src="{{$item->getMedia('listings')[0]->getFullUrl()}}"
                                                 alt="Property Image"
                                                 class="img-a img-fluid thumbnail w-100" style="width: 100%;height: 250px;object-fit: cover">
                                        @else
                                            <img src="{{asset('img/download.png')}}" alt="Property Image"
                                                 class="img-a img-fluid thumbnail w-100" style="width: 100%;height: 250px;object-fit: cover">
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <h5 class="card-header-a">
                                            <a href="{{route('listings.show', $item->id)}}">{{$item->title}}</a>
                                        </h5>
                                        <h4>Rs:{{$item->price}}</h4>
                                    </div>
                                    <span>Type: {{json_decode($item->features)->type ?:'N/a'}}</span>

                                    <div class="card-tag">
                                        @if(json_decode($item->features)->type == 'Home')
                                        <span>{{json_decode($item->features)->bedroom ?:0}}</span>
                                        <span>Bed</span> |
                                        <span>{{json_decode($item->features)->bathroom ?:0}}</span>
                                        <span>Baths</span> |
                                        @endif
                                        <span>{{json_decode($item->features)->area ?:0}} m<sup>2</sup></span>
                                        <span>Area</span> |
                                    </div>
                                    <p class="" style="margin: 0.5rem 0">{{$item->description ? Str::limit($item->description, 40) :'N/a'}}</p>
                                    <a href="{{route($route.'show', $item->id)}}" class="btn btn-secondary ">Read More</a>
                                    <div class="d-inline-flex float-right">
                                        <a href="{{ route($route.'edit',$item->id) }}" type="submit"
                                           class="btn btn-primary mr-2"><i
                                                class="fas fa-pencil-alt fa-md"></i></a>
                                        <form class="d-inline"
                                              action="{{ route($route.'destroy',$item->id) }}"
                                              method="POST" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button href="{{route($route.'destroy',$item->id)}}"
                                                    type="submit"
                                                    class="btn btn-danger"><i
                                                    class="fas fa-trash fa-md"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            @else
                            <div class="alert alert-info">
                                <h5>There is no any property on rent.</h5>
                                <p>To sell your property, simply tap the "Add a property" button.</p>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).on('mouseover', '.add', function () {
            $('.addIcon').addClass('fa-bounce');
        })
        $(document).on('mouseout', '.add', function () {
            $('.addIcon').removeClass('fa-bounce');
        })
    </script>
@endpush
