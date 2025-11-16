@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.product_details')])


    <!-- START HEADING SECTION -->
    <div class="about_content padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="product-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb text-center text-lg-left">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                              
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('cart.index')}}">Shop</a></li>
                                
                            </ol>
                        </nav>
                        <div class="pro-detail-sec row">
                            <div class="col-12">
                                <h4 class="pro-heading text-center text-lg-left">{{$product->title}}</h4>
                                <p class="pro-text text-center text-lg-left">{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="row product-list product-detail">
 
                            <div class="col-12 col-lg-6 product-detail-slider text-center">
                                <div class="wrapper">
                                    <div class="Gallery swiper-container img-magnifier-container" id="gallery">
                                        <div class="swiper-wrapper myimgs">
                                            <div class="swiper-slide"> <a href="{{asset($product->image)}}" data-fancybox="1"
                                                    title="Zoom In"><img class="myimage" src="{{asset($product->image)}}"
                                                        alt="gallery" /></a></div>
                                        </div>
                                    </div>
                                    <div class="Thumbs swiper-container" id="thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"> <img src="{{asset($product->image)}}" alt="thumnails" /></div>
                                            <div class="swiper-slide"> <img src="{{asset($product->image)}}" alt="thumnails" /></div>
                                            <div class="swiper-slide"> <img src="{{asset($product->image)}}" alt="thumnails" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-12 col-lg-6 text-center text-lg-left">
                                <div class="product-single-price">
                                    <h4><span class="real-price">$249</span> <span><del>$450</del></span></h4>
                                    <p class="pro-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        tellus lacus faucibus lectus.</p>
                                </div>

                                <div class="product-checklist">
                                    <ul>
                                        <li><i class="fas fa-check"></i> Satisfaction 100% Guaranteed</li>
                                        <li><i class="fas fa-check"></i> free shipping on orders over $99</li>
                                        <li><i class="fas fa-check"></i> 14 days easy Return</li>
                                    </ul>
                                </div>

                                <div class="row product-quantity input_plus_mins no-gutters">

                                    <div class="qty col-12 col-lg-3 d-lg-flex  align-items-lg-center d-inline-block">
                                        <span class="minus"><i class="las la-minus"></i></span>
                                        <input type="number" class="count" name="qty" value="1">
                                        <span class="plus"><i class="las la-plus"></i></span>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <button class="btn web-btn rounded-pill">ADD TO CART</button>
                                    </div>
                                </div>


                                <div class="dropdown-divider"></div>

                                <div class="product-tags-list">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <p class="d-inline">SKU: <span>00012</span></p>
                                            </li>
                                            <li class="breadcrumb-item"><span class="d-inline">Categories: <a
                                                        href="#">Food</a><span class="comma-separtor">,</span><a
                                                        href="#">Fruits</a></span></li>
                                            <li class="breadcrumb-item" aria-current="page">
                                                <p class="d-inline">Tags: <a href="#">Fruits</a><span
                                                        class="comma-separtor">,</span><a href="#">Food</a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                                <div class="share-product-details">
                                    <ul class="share-product-icons">
                                        <li>
                                            <p>Share Link:</p>
                                        </li>
                                        <li><a href="#" class="facebook-bg-hvr"><i class="fab fa-facebook-f"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="twitter-bg-hvr"><i class="fab fa-twitter"
                                                    aria-hidden="true"></i></a> </li>
                                        <li><a href="#" class="linkedin-bg-hvr"><i class="fab fa-linkedin-in"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="instagram-bg-hvr"><i class="fab fa-instagram"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}



                        </div>


                    </div>

                </div>
            </div>
        </div>
        <!--START LATEST ARRIVALS-->
        <section class="best-products">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="heading-details">
                            <h4 class="heading">Best Selling Items</h4>
                        </div>
                    </div>
                </div>
                <div class="best-products-carousel owl-carousel owl-themesss">
                    @foreach ($products as $product )
                    
                    
                    <div class="item text-center">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset($product->image)}}">
                                <div class="overlay-img">
                                    <div class="overlay-content">
                                        <a href="#"><i class="las la-heart"></i></a>
                                        <a href="#"><i class="las la-shopping-bag"></i></a>
                                           <a href="{{route('product.details', $product->id)}}"
                                                                class="btn btn-view"><i class="las la-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail">
                                <span class="product-cat">Category</span>
                                <h4 class="product-name">{{$product->title}}</h4>
                                <span class="fly-line"></span>
                                <ul class="reviews">
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </section>
        <!--END LATEST ARRIVALS-->
    </div>
    <!-- END HEADING SECTION -->
{{-- subscribe --}}
@include('front.components.subscribe')
{{-- subscribe --}}
@endsection