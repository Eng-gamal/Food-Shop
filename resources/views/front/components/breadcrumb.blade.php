<!--slider sec strat-->
<section id="slider-sec" class="slider-sec parallax"
    style="background: url({{asset('uploads/images/breadcrumbs/1.jpg')}});">
    <div class="overlay text-center d-flex justify-content-center align-items-center">
        <div class="slide-contain">
            <h4>{{ $page_title ?? '' }}</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('words.home')}}</a></li>
                        {{-- <li class="breadcrumb-item"><a>{{ $page_title ?? '' }}</a></li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
{{-- @include('front.components.ceadcramp', ['page_title' => __('words.adout-us')]) --}}
<!--slider sec end-->