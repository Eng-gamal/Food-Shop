@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.contact_us')])
    <!-- Contact Us Start -->
    <section class="contact-sec" id="contact-sec">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 contact-description wow slideInLeft" data-wow-delay=".8s">
                    <div class="contact-detail wow fadeInLeft">
                        <div class="ex-detail">

                            <h4 class="large-heading">
                                <span class="heading-1">{{__('words.contact_us')}}</span>

                            </h4>
                        </div>
                        <p class="small-text text-center text-md-left">
                            {{settings()->footer_description}}
                        </p>
                        <div class="row location-details text-center text-md-left">
                            <div class="col-12 col-md-6 country-1">

                                <ul>
                                    <li><i class="fas fa-mobile-alt"></i><a
                                            href="https://wa.me/201234567890">{{ settings()->contact()->active()->where('type', 'whatsapp')->first()->contact }}</a>
                                    </li>
                                    <li><i class="fas fa-envelope"></i><a
                                            href="{{ settings()->contact()->active()->where('type', 'email')->first()->contact }}">{{settings()->contact_email}}</a>
                                    </li>
                                    <li><i class="fas fa-map-marker"></i><a href="#">{{settings()->address}}</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 contact-box text-center text-md-left wow slideInRight" data-wow-delay=".8s">
                    <div class="c-box wow fadeInRight">
                        <h4 class="large-heading">{{__('words.leave_message')}}</h4>
                        <!--                        <p class="small-text">Lorem ipsum is simply dummy text of the printing and typesetting industry. </p>-->
                        @include('front.components.contact-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us End -->

    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
@endsection