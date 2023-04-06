<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>property.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- GoogleFonts -->
    <link href=https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootst CSS File -->
    <link href={{url ("frontend/lib/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Library CSS Files -->
    <link href={{url ("frontend/lib/font-awesome/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{url ("frontend/lib/animate/animate.min.css")}} rel="stylesheet">
    {{-- <link href={{url ("frontend/lib/ionicons/css/ionicons.min.css")}} rel="stylesheet"> --}}
    <link href={{url ("frontend/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href={{url("frontend/css/style.css")}} rel="stylesheet">
</head>

<body>
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="Type">Keyword</label>
                        <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <select class="form-control form-control-lg form-control-a" id="Type">
                            <option>All Type</option>
                            <option>For Rent</option>
                            <option>For Sale</option>
                            <option>Open House</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control form-control-lg form-control-a" id="city">
                            <option>All City</option>
                            <option>Alabama</option>
                            <option>Arizona</option>
                            <option>California</option>
                            <option>Colorado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <select class="form-control form-control-lg form-control-a" id="bedrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="garages">Garages</label>
                        <select class="form-control form-control-lg form-control-a" id="garages">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <select class="form-control form-control-lg form-control-a" id="bathrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="price">Min Price</label>
                        <select class="form-control form-control-lg form-control-a" id="price">
                            <option>Unlimite</option>
                            <option>$50,000</option>
                            <option>$100,000</option>
                            <option>$150,000</option>
                            <option>$200,000</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search property</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--/ Form Search End /-->

<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="/">Real<span class="color-b">State</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="#" >Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="#">Rent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Sell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Rentals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Pages
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="property-single.html">property Single</a>
                    <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                    <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
                    <a class="dropdown-item" href="agent-single.html">Agent Single</a>
                  </div>
                </li> -->
            </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
    </div>
</nav>
<script>
    const links = document.querySelectorAll("nav a");
    const currentPage = window.location.pathname;

    links.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("active");
        }
    });

</script>
<!--/ Nav End /-->
@yield('home-content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Buy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Sell</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Rent</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Manage Rentals</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
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
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">Property.com</span> All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src={{url("frontend/lib/jquery/jquery.min.js")}}></script>
<script src={{url("frontend/lib/jquery/jquery-migrate.min.js")}}></script>
<script src={{url("frontend/lib/popper/popper.min.js")}}></script>
<script src={{url("frontend/lib/bootstrap/js/bootstrap.min.js")}}></script>
<script src={{url("frontend/lib/easing/easing.min.js")}}></script>
<script src={{url("frontend/lib/owlcarousel/owl.carousel.min.js")}}></script>
<script src={{url("frontend/lib/scrollreveal/scrollreveal.min.js")}}></script>
<!-- contact Form JavaScript File -->
<script src={{url("frontend/rentform/rentform.js")}}></script>

<!-- Template Main Javascript File -->
<script src={{url("frontend/js/main.js")}}></script>

</body>
</html>


