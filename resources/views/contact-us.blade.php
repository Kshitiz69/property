@extends('frontend.layouts.main')
@section('main-container')

<section class="contact-section section-t8">
    <section class=" container ">
        <div class="row ">
            <div class="contact-info  col-12  d-flex flex-column justify-content-between align-items-center">
                <div class="d-flex flex-column align-items-center">
                    <h1 class="title-a">
                        Contact Us
                    </h1>
                    <p class="contact-c">
                        Looking for property to buy or rent ?
                    </p>
                </div>

                <div class="">
                    <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                    </li>
                    </ul>
                </div>

            </div>

            <div class=" position-relative col-12 ">
                <form class="contact-form" action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="form-group row mb-4">
                        <div class="contact-form_input_wrapper col-12 col-md-6 mb-4 mb-md-0">
                            <label for="name" class="input_label">Name</label>
                            <input type="text" id="name" name="name" autocomplete="off" class=" contact-form_input w-100" placeholder="Sonam Hitang" value="{{$user->name}}"/>
                        </div>
                        <div class="contact-form_input_wrapper col-12 col-md-6">
                            <label for="email" class="input_label">Email</label>
                            <input type="email" id="email" name="email" autocomplete="off" class=" contact-form_input w-100" placeholder="sonam@gmail.com" value="{{$user->email}}"/>
                        </div>

                    </div>

                    <div class="contact-form_input_wrapper  mb-4">
                        <label for="phone" class="input_label">Phone</label>
                        <input type="number" id="phone" name="phone" autocomplete="off" class=" contact-form_input w-100" placeholder="9806657898" value="{{$user->phone}}"/>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="contact-form_input_wrapper  col-12 col-md-7 mb-4 mb-md-0">
                        <label for="message" class="input_label">Message</label>
                        <textarea  id="message" autocomplete="off" name="message" class=" contact-form_textarea w-100" placeholder="I would like to...">

                        </textarea>
                    </div>

                    <div class="col-12 col-md-5 mt-4 mt-md-0">
                        <label for="message" class="input_label">Property Placeholder</label>

                            <div class="card-box-a card-shadow" style="position: relative">
                                <div class="img-box-a">
                                    <img
                                        src="{{$property->getMedia('listings')[0]->getFullUrl()}}" alt="Image"
                                        class="img-a img-fluid h-100">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h2 class="card-title-a">
                                                {{$property->title}}
                                            </h2>
                                        </div>
                                        <div class="card-body-a">
                                            <div class="price-box d-flex">
                                                <span class="price-a">Price | Rs. {{$property->price}}</span>
                                            </div>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                                <li>
                                                    <h4 class="card-info-title">Area</h4>
                                                    <span>{{json_decode($property->features)->area}}
                                                        m<sup>2</sup>
                                                  </span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Beds</h4>
                                                    <span>{{json_decode($property->features)->bedroom}}
                                                    </span>

                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Baths</h4>
                                                    <span>{{json_decode($property->features)->bathroom}}
                                                    </span>

                                                </li>
                                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                                <input type="hidden" name="property_owner" value="{{$property->user_id}}">
                                                <input type="hidden" name="property_id" value="{{$property->id}}">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="contact-action ">
                        <button class="btn send-button w-100 p-3 mt-md-4" type="submit">
                            Send
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</section>

@endsection
