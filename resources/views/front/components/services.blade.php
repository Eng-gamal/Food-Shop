<section class="mini-services" id="mini-services">
    <div class="container">
        <div class="row no-gutters">
            @foreach ($features as $feature)


                <div class="col-12 col-md-6 col-lg-3 text-center mini-s">
                    <div class="mini-service-card">
                        <div class="service-icon"><i class="{{$feature->icon}}"></i></div>
                        <h4 class="mini-service-heading">{{$feature->title}}</h4>
                        <span class="small-des">{{$feature->description}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>