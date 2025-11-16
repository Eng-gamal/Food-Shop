<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <!-- Author -->
    <meta name="author" content="Themes Industry" />
    <!-- description -->
    <meta name="description"
        content="MegaOne is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos." />
    <!-- keywords -->
    <meta name="keywords"
        content="Creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq" />
    <!-- Page Title -->
    <title>Food Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{--
    <script
        src="https://www.paypal.com/sdk/js?client-id=AXp-TVISLwnwZWpDht54DVKI7wPv9HLIDBJguFLRcJ3YF3dykf1rgQIF1GO-LjmCM1sPsz-PbfQfkDLr&currency=USD">
        </script> --}}

    <!-- Favicon -->
    <link href="{{asset('front/img/favicon.ico')}}" rel="icon" />

    <!-- Bundle -->
    <link href="{{asset('front/vendor/css/bundle.min.css')}}" rel="stylesheet" />
    <!-- Plugin Css -->
    <link href="{{asset('front/css/line-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/revolution-settings.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/jquery.fancybox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/cubeportfolio.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/LineIcons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('front/vendor/css/wow.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/settings.css')}}" rel="stylesheet" />
    <link href="{{asset('front/css/blog.css')}}" rel="stylesheet" />


    @if (App::getLocale() == 'ar')
        <link href="{{asset('front/css/style-rtl.css')}}" rel="stylesheet" />

    @else
        <link href="{{asset('front/css/style-ltr.css')}}" rel="stylesheet" />
    @endif


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <!-- Preloader -->
    <div class="preloader">
        <div class="centrize full-width">
            <div class="vertical-center">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!--Header Start-->

    <header id="header">
        <div class="upper-nav">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-auto mb-auto">
                        <ul class="d-flex mb-0 top-info">
                            <li class="c-links d-none d-lg-block">
                                <span><i class="lab la-whatsapp"></i></span><a
                                    href=" {{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}">{{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}</a>
                            </li>
                        </ul>
                    </div>
                    <div
                        class="col-12 col-lg-6 mt-auto mb-auto d-lg-flex justify-content-center justify-content-lg-end">
                        <ul class="shop-details d-flex">
                            @if(session()->has('user'))
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fas fa-user"></i> {{ session('user.name') }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form method="POST" action="{{ url('/logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt"></i> {{__('words.sign_out')}}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class=" dropdown">
                                    <a href="#" class="dropdown-toggle open_user" data-bs-toggle="dropdown">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">
                                                <i class="fas fa-sign-in-alt"></i>{{__('words.sign_in')}}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('register') }}">
                                                <i class="fas fa-user-plus"></i> {{__('words.sign_in_to_user')}}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif



                            {{-- <li>
                                <a href="javascript:void(0)" class="open_search"><i class="las la-search"></i></a>
                            </li> --}}
                            {{--
                            <li>
                                <a href="{{route('cart.index')}}" id="open-shop-card"><i
                                        class="las la-shopping-bag"></i></a>
                            </li> --}}
                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="las la-shopping-bag"></i>
                                    <span class="cart-count badge bg-danger">
                                        {{ session('cart') ? count(session('cart')) : 0 }}
                                    </span>
                                </a>

                            </li>
                        </ul>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <a class="navbar-brand" href="{{route('home')}}"><img
                                src="{{asset('uploads/images/logo.png')}}" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Navigation-->
        <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
            <div class="container">
                <div class="row no-gutters w-100">
                    <div class="col-6 col-lg-3 offset-3 offset-lg-0">
                        <a href="{{route('home')}}" title="Logo" class="logo fixed-nav-items">
                            <!--Logo Default-->
                            <img src="{{asset('uploads/images/logo.png')}}" alt="logo" class="logo-dark" />
                        </a>
                    </div>
                    <!--Nav Links-->
                    <div class="col-6 d-none d-lg-flex justify-content-lg-center align-items-lg-center">
                        <div class="collapse navbar-collapse" id="megaone">
                            <ul class="navbar-nav ml-auto mr-auto">
                                <li>
                                    <a class="nav-link " href="{{route('home')}}">{{__('words.home')}}</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('about')}}">{{__('words.about')}}</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('product')}}">{{__('words.products')}}</a>
                                    {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('product')}}"><i
                                                class="las la-angle-double-right"></i> Product
                                            Listing</a>
                                        <a class="dropdown-item" href="{{route('product')}}"><i
                                                class="las la-angle-double-right"></i> Product
                                            Detail</a>

                                    </div> --}}
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('cart.index')}}">{{__('words.shop')}}</a>
                                </li>

                                <li>
                                    <a class="nav-link" href="{{route('contact')}}">{{__('words.contact')}}</a>
                                </li>
                                <li>
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="{{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'd-none' : '' }} nav-link"
                                            rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <span class="symbol symbol-30 mr-3">
                                                @if ($localeCode == 'en')
                                                    <span class="navi-text">{{ __('words.english') }}</span>
                                                @elseif ($localeCode == 'ar')
                                                    <span class="navi-text">{{ __('words.arabic') }}</span>
                                                @else
                                                    <span class="navi-text">{{ $properties['native'] }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Side Menu Button-->
                    <div class="col-3 d-flex justify-content-end align-items-center">
                        <ul class="shop-details fixed-nav-items">
                            {{-- <li>
                                <a href="javascript:void(0)" class="open_search"><i class="las la-search"></i></a>
                            </li> --}}

                            <li>
                                <a href="{{ route('cart.index') }}">
                                    <i class="las la-shopping-bag"></i>
                                    <span class="cart-count badge bg-danger">
                                        {{ session('cart') ? count(session('cart')) : 0 }}
                                    </span>
                                </a>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <svg id="header-svg" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="60"
            viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 C40 0 60 0 100 100 Z" />
        </svg>
        <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </header>

    <!--Side Nav-->
    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="{{route('home')}}">{{__('words.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">{{__('words.about')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('product')}}">{{__('words.products')}}</a>
                        {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <a class="dropdown-item" href="{{route('product')}}"><i
                                    class="las la-angle-double-right"></i> Product Listing</a>
                            <a class="dropdown-item" href="{{route('product')}}"><i
                                    class="las la-angle-double-right"></i> Product Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="las la-angle-double-right"></i> Standalone</a>

                        </div>
                        --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product')}}">{{__('words.shop')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">{{__('words.contact')}}</a>
                    </li>

                    <li class="c-links d-none d-lg-block">
                        <span><i class="lab la-whatsapp"></i></span><a
                            href=" {{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}">{{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}</a>
                    </li>

                    <li>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="{{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'd-none' : '' }}"
                                rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <span class="symbol symbol-30 mr-3">
                                    @if ($localeCode == 'en')
                                        <span class="navi-text">{{ __('words.english') }}</span>
                                    @elseif ($localeCode == 'ar')
                                        <span class="navi-text">{{ __('words.arabic') }}</span>
                                    @else
                                        <span class="navi-text">{{ $properties['native'] }}</span>
                                    @endif
                                </span>
                            </a>
                        @endforeach
                    </li>
                </ul>
            </nav>

            <div class="side-footer w-100">
                <ul class="social-icons-simple">
                    <li>
                        <a class="facebook-text-hvr"
                            href="{{ settings()->contact()->active()->where('type', 'social')->first()->contact }}"><i
                                class="fab fa-facebook-f"></i></a>

                    </li>
                    <li>
                        <a class="instagram-text-hvr"
                            href="{{ settings()->contact()->active()->where('type', 'social2')->first()->contact }}"><i
                                class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter-text-hvr"
                            href="{{ settings()->contact()->active()->where('type', 'social3')->first()->contact }}"><i
                                class="fab fa-twitter"></i>
                        </a>
                    </li>
                </ul>
                <p class="text-dark">
                    {{(settings()->copyrights)}}
                </p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->