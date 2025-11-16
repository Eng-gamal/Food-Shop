@extends('front.layout.master')
@section('content')
    @include('front.components.breadcrumb', ['page_title' => __('words.about')])

    <!--mini services start-->
    @include('front.components.services')
    <!--mini services end-->

    <!--about us section start-->
    @include('front.components.about')

    <!--about us section end-->

    <!--testimonial sec start-->
    @include('front.components.testimonia')
    <!--testimonial sec end-->

    <!--newsletter sec start-->

    <!--newsletter sec end-->
    {{-- subscribe --}}
    @include('front.components.subscribe')
    {{-- subscribe --}}
@endsection