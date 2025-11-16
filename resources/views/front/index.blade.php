@extends('front.layout.master')
@section('content')
    @include('front.components.sliders')

    <!--mini services start-->
    @include('front.components.services')
    <!--mini services end-->

    <!--featured item sec start-->
    <section class="featured-items padding-top padding-bottom" id="featured-items">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="heading-details mb-0">
                        <h4 class="heading">{{__('words.our_products')}}</h4>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-8 offset-md-2 text-center mb-4">
                    <p class="text">
                        Lorem ipsum is simply dummy text of the printing and type setting
                        has been the industry.
                    </p>
                </div> --}}
            </div>
            <div class="row">
                @foreach ($products as $product)

                    <div class="col-12 col-md-6 col-lg-4 text-center wow slideInUp">
                        <div class="featured-item-card">
                            <div class="item-img">
                                <img src="{{asset($product->image)}}" />
                                <div class=" item-overlay">
                                    <div class="item-btns">
                                        <a href="javascript:void(0)" class="btn btn-view add-to-cart"
                                            data-id="{{ $product->id }}">
                                            <i class="las la-shopping-bag"></i>
                                        </a>

                                        <a href="#" class="btn btn-view"><i class="las la-heart"></i></a>
                                        <a href="{{route('product.details', $product->id)}}" class="btn btn-view"><i
                                                class="las la-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-detail">
                                <h4 class="item-name">{{$product->title}}</h4>
                                <ul class="reviews">
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                </ul>
                                <p class="item-price">${{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <a href="{{route('product')}}" class="btn web-btn rounded-pill">{{__('words.show_more')}} <i
                            class="las la-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--featured item sec end-->

    <!--mini banner start-->
    <div class="banner padding-bottom padding-top parallax"
        style="background-image: url({{asset('front/img/banner.jpg')}})">
        <div class="overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12  offset-md-4 text-center">
                    <div class="banner-inner-content">
                        <h4 class="banner-heading">
                            <i class="las la-gifts"></i>{{__('words.sale')}}
                        </h4>

                        @if($product && $product->offer)
                            {{-- <h4 class="banner-heading">{{ $product->title }}</h4> --}}
                            <p class="banner-text">{{__('words.offer')}}{{ $product->offer->discount }}%
                                {{__('words.sub_offer')}}</p>
                            <div class="count-down-date">
                                <div class="content">
                                    <div class="days">
                                        <h4 class="num" id="days">{{$product->offer->end_date}}</h4>
                                        <span class="text">{{__('words.days')}}</span>
                                    </div>
                                    <div class="hours">
                                        <h4 class="num" id="hours">00</h4>
                                        <span class="text">{{__('words.hours')}}</span>
                                    </div>
                                    <div class="minutes">
                                        <h4 class="num" id="minutes">00</h4>
                                        <span class="text">{{__('words.minutes')}}</span>
                                    </div>
                                    <div class="sec">
                                        <h4 class="num" id="seconds">00</h4>
                                        <span class="text">{{__('words.sec')}}</span>
                                    </div>

                                    <a href="{{route('product')}}" class="btn web-btn rounded-pill">{{__('words.shop_now')}} <i
                                            class="las la-external-link-alt"></i>
                                    </a>
                                </div>
                                <div class="img-container">
                                    <img src="{{asset($product->image)}}" />
                                </div>
                            </div>
                        @else
                            <h4>لا يوجد عروض حالياً</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if($product && $product->offer)
    <h3>{{ $product->title }}</h3>
    <h4>السعر الأصلي: {{ $product->price }} جنيه</h4>
    <h4>الخصم: {{ $product->offer->discount }}%</h4>
    <h4>السعر بعد الخصم:
        {{ $product->price - ($product->price * $product->offer->discount / 100) }}
        جنيه
    </h4>
    @else
    <h4>لا يوجد عروض حالياً</h4>
    @endif --}}
    <!--mini banner end-->



    <!--about us section start-->
    @include('front.components.about')

    <!--about us section end-->

    <!--testimonial sec start-->
    @include('front.components.testimonia')



    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
    <!--testimonial sec end-->
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


        // خلي التاريخ يطلع بصيغة ISO عشان JavaScript يفهمه
        var countDownDate = new Date("{{ \Carbon\Carbon::parse($product?->offer->end_date)->format('Y-m-d\TH:i:s') }}").getTime();

        var timer = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
            document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

            if (distance < 0) {
                clearInterval(timer);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
    </script>
    <script>
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', async function () {
                const productId = this.dataset.id;

                const response = await fetch("{{ url('/cart/add') }}/" + productId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    credentials: "same-origin"
                });


                if (response.status === 401) {
                    // toastr.error(" لازم تسجل الدخول الأول");
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                const data = await response.json().catch(err => {
                    console.error("JSON Parse Error:", err);
                });


                if (response.ok && data) {

                    document.querySelectorAll('.cart-count').forEach(el => {
                        el.innerText = data.cart_count;
                    });
                    toastr.success(data.message);
                } else {
                    toastr.error("حصل خطأ");
                }
            });
        });
    </script>

@endpush