<!--Footer Start-->
<footer class="footer-style-1">
    <div class="container">
        <div class="row align-items-center">
            <!--Social-->
            <div class="col-md-4">
                <div class="footer-social">
                    <a class="navbar-brand" href="{{route('home')}}"><img
                            src="{{asset('uploads/images/logo.png')}}" /></a>
                    <ul class="list-unstyled" style="padding-top:5rem ">
                        <li>
                            <a class="wow fadeInUp"
                                href="{{ settings()->contact()->active()->where('type', 'social')->first()->contact }}"><i
                                    aria-hidden="true" class="lab la-facebook-f"></i></a>
                        </li>
                        <li>
                            <a class="wow fadeInDown"
                                href="{{ settings()->contact()->active()->where('type', 'social3')->first()->contact }}"><i
                                    aria-hidden="true" class="lab la-twitter"></i></a>
                        </li>

                        <li>
                            <a class="wow fadeInDown"
                                href="{{ settings()->contact()->active()->where('type', 'social4')->first()->contact }}"><i
                                    aria-hidden="true" class="lab la-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a class="wow fadeInUp"
                                href="{{ settings()->contact()->active()->where('type', 'social2')->first()->contact }}"><i
                                    aria-hidden="true" class="lab la-instagram"></i></a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <h5 class="text-align-right">{{__('words.links')}}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('home') }}">{{ __('words.home') }}</a></li>
                    <li><a href="{{route('about') }}">{{ __('words.about') }}</a></li>
                    <li><a href="{{route('product')}}">{{ __('words.products') }}</a></li>
                    <li><a href="{{route('contact')}}">{{ __('words.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="text-align-right">{{__('words.contact_us')}}</h5>
                <ul class="list-unstyled ">
                    <li><i class="fa fa-map-marker"></i> {{settings()->address}}</li>
                    <li><i class="fa fa-phone"></i><a
                            href="https://wa.me/201234567890">{{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}</a>
                    </li>
                    <li><i class="fa fa-envelope"></i>
                        <a
                            href="{{ settings()->contact()->active()->where('type', 'email')->first()->contact }}">{{settings()->contact_email}}</a>
                    </li>
                </ul>
            </div>

            <!--Text-->
            <div class="col-lg-12 text-center">

                <p class="site-footer__bottom-text">{{settings()->copyrights}}</p>
                <hr class="col-12" style=" background-color: #000000;
    margin: 0rem 0;
    color: inherit;">
                <p class="site-footer__bottom-text text-center" style="padding:0 0px ">
                    <span>{{__('words.developed')}}</span>
                    <span><a href="https://www.cl4it.com/en">{{__('words.sub_developed')}}</a>
                    </span>
                </p>

            </div>
        </div>
    </div>
</footer>
<!--Footer End-->

{{-- <!--Scroll Top Start-->
<span class="scroll-top-arrow"><i class="fas fa-angle-up"></i></span>
<!--Scroll Top End-->

<!--Shop card window Start-->
<section class="shop-card-window hidden" id="shop-card-window">
    <a href="#" id="close-card-window" class="close-card-window"><i class="las la-times"></i></a>
    <div class="shop-card-window-content">
        <h4 class="shop-card-heading">My Bag</h4>
        <div class="d-flex justify-content-center align-items-center">
            <div class="mini-bag">
                <div class="bag-item">
                    <div class="item-img">
                        <img src="food-shop/img/item1.jpg" />
                    </div>
                    <div class="item-details">
                        <h4 class="item-name">Product Name</h4>
                        <span class="item-qty">Qty: 2</span>
                        <span class="item-price">Price: $300</span>
                        <a href="#" class="basket"><i class="las la-trash"></i> </a>
                    </div>
                </div>
                <div class="bag-item">
                    <div class="item-img">
                        <img src="food-shop/img/item2.jpg" />
                    </div>
                    <div class="item-details">
                        <h4 class="item-name">Product Name</h4>
                        <span class="item-qty">Qty: 2</span>
                        <span class="item-price">Price: $300</span>
                        <a href="#" class="basket"><i class="las la-trash"></i> </a>
                    </div>
                </div>
                <div class="bag-item">
                    <div class="item-img">
                        <img src="food-shop/img/item3.jpg" />
                    </div>
                    <div class="item-details">
                        <h4 class="item-name">Product Name</h4>
                        <span class="item-qty">Qty: 2</span>
                        <span class="item-price">Price: $300</span>
                        <a href="#" class="basket"><i class="las la-trash"></i> </a>
                    </div>
                </div>
                <div class="bag-item">
                    <div class="item-img">
                        <img src="food-shop/img/item4.jpg" />
                    </div>
                    <div class="item-details">
                        <h4 class="item-name">Product Name</h4>
                        <span class="item-qty">Qty: 2</span>
                        <span class="item-price">Price: $300</span>
                        <a href="#" class="basket"><i class="las la-trash"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bag-btn">
            <h4 class="total"><span>Total: </span>100$</h4>
            <a href="#" class="btn web-dark-btn rounded-pill">View Bag </a>
            <a href="#" class="btn web-btn rounded-pill">Checkout </a>
        </div>
    </div>
</section>
<!--Shop card window  End-->

<!--Search modal window start-->
<div class="search_block">
    <div class="search_box animated wow fadeInUp d-flex justify-content-center align-items-center">
        <div class="inner">
            <input type="text" name="search" id="search" class="search_input" autocomplete="off"
                placeholder="Enter Your Keywords.." />
            <button class="search_icon glyphicon glyphicon-search">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <div class="search-overlay"></div>
</div>
<!--Search modal window end--> --}}

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="{{asset('front/vendor/js/bundle.min.js')}}"></script>

<!-- Plugin Js -->
<script src="{{asset('front/vendor/js/jquery.appear.js')}}"></script>
<script src="{{asset('front/vendor/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('front/vendor/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/vendor/js/parallaxie.min.js')}}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{asset('front/vendor/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('front/vendor/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('front/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{asset('front/vendor/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('front/vendor/js/extensions/revolution.extension.video.min.js')}}"></script>

<script src="{{asset('front/vendor/js/wow.min.js')}}"></script>
<!-- google map-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJRG4KqGVNvAPY4UcVDLcLNXMXk2ktNfY"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('front/js/map.js')}}"></script>
<!--Tilt Js-->
<!-- custom script-->
<script src="{{asset('front/js/countdown.js')}}"></script>
<script src="{{asset('front/js/script.js')}}"></script>
@stack('scripts')