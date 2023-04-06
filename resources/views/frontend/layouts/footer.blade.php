  <!--/ footer Star /-->
  <style>
      a{
          text-decoration:none;
      }
  </style>
  <section class="section-footer" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
                <a class="navbar-brand text-brand" href="{{url('/')}}">Property<span class="color-b">.com</span></a>
            </div>
            {{-- <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div> --}}
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone :</span> contact@example.com</li>
                <li class="color-a">
                  <span class="color-text-a">Email :</span> +977 986945234</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                  </li>
                  {{-- <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#"></a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#"></a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#"></a> --}}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Contact</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Customer Support</a>
                </li>
                {{-- <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"></a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"></a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"></a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"></a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"></a> --}}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="{{route('buy.index')}}">Buy</a>
              </li>
              <li class="list-inline-item">
                <a href="{{route('sell.index')}}">Sell</a>
              </li>
              <li class="list-inline-item">
                <a href="{{route('listings.index')}}">Rent</a>
              </li>
                @if(auth()->user())
              <li class="list-inline-item">
                <a href="{{route('manage-listings.index')}}">Manage Rentals</a>
              </li>
                @endif
            </ul>
          </nav>
           <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">

                  <i class="fa-brands fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa-brands fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa-brands fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">RealState</span> All Rights Reserved.
            </p>
        </div>
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
</section
</body>
</html>
