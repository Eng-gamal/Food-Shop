<section class="about-sec padding-top padding-bottom" id="about-sec">
    <div class="container">
        <div class="row" style=" direction: rtl; text-align: right; direction: ltr; text-align: left;">



            <div class="col-12 text-center">
                <div class="heading-details">
                    <h4 class="heading">{{$about_page->title}}</h4>
                </div>
            </div>
            <div class="col-12 col-md-8 offset-md-2 text-center">
                <p class="text">{{$about_page->description}}</p>
            </div>

        </div>
        <div class="row services-area">
            @foreach ($abouts as $about)
                <div class="col-12 col-lg-4 services text-center">
                    <div class="service-card">
                        <div class="image-holder"><i class="{{$about->icon}}"></i></div>
                        <h4 class="service-heading">{{$about->title}}</h4>
                        <p class="text">{{$about->sub_description}}</p>
                        <a href="{{route('about')}}" class="btn web-trans-btn rounded-pill">{{__('words.read_more')}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>