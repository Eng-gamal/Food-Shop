<!--testimonial sec start-->
<section class="testimonial-sec padding-top padding-bottom" id="testimonial-sec">
    <svg id="test-header" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="60"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C40 0 60 0 100 100 Z" />
    </svg>

    <div class="container">
        <div class="testimonial-carousel owl-carousel owl-theme"
            style=" direction: rtl; text-align: right; direction: ltr; text-align: left;">
            @foreach ($testimonials as $testimonial)


                <div class="item text-center">
                    <div class="testimonial-review">
                        <div class="review-image">
                            <img src="{{asset($testimonial->image)}}">
                        </div>
                        <div class="review-detail">
                            <h4 class="test-heading">{{$testimonial->title}}</h4>
                            <p class="text-des">{{$testimonial->description}}</p>
                            <ul class="test-review">
                                <li><a href="{{route('about')}}"><i class="las la-star"></i></a></li>
                                <li><a href="{{route('about')}}"><i class="las la-star"></i></a></li>
                                <li><a href="{{route('about')}}"><i class="las la-star"></i></a></li>
                                <li><a href="{{route('about')}}"><i class="las la-star"></i></a></li>
                                <li><a href="{{route('about')}}"><i class="las la-star"></i></a></li>
                            </ul>
                        </div>
                        <div class="client-info media-body">
                            <h5 class="client-name mt-0">{{$testimonial->sub_title}} </h5>
                            <p class="client-designation">/ {{$testimonial->job_title}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a id="customPrevBtn" class="test-btn"><i class="fas fa-angle-left"></i></a>
        <a id="customNextBtn" class="test-btn"><i class="fas fa-angle-right"></i></a>
    </div>

    <!--    <svg id="test-footer" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="60" viewBox="0 0 100 100" preserveAspectRatio="none">-->
    <!--        <path d="M0 100 C40 0 60 0 100 100 Z"/>-->
    <!--    </svg>-->
</section>
<!--testimonial sec end-->