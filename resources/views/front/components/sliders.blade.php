<!--Home Start-->
<section class="slider-sec" id="slider-sec">
    <div id="rev-slider" class="rev-slider"
        style=" direction: rtl; text-align: right; direction: ltr; text-align: left;">
        <div id="rev_slider_18_1_wrapper" class="rev_slider_wrapper fullscreen-container"
            data-alias="megaone-restaurant-1" data-source="gallery" style="background: transparent; padding: 0px">
            <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
            <div id="rev_slider_18_1" class="rev_slider fullscreenbanner" style="display: none" data-version="5.4.8.1">
<ul>
    @foreach ($sliders as $key => $slider)
        <!-- SLIDE  -->
        <li data-index="rs-44{{ $key }}" data-transition="fade" data-slotamount="default"
            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
            data-masterspeed="300" data-thumb="assets/100x50_3d469-bg-light-1.jpg" data-rotate="0"
            data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
            data-param10="" data-description="">
            
            <!-- MAIN IMAGE -->
            <img src="{{ asset($slider->image) }}" alt="" data-bgposition="center center" data-bgfit="cover"
                data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
            
            <!-- OVERLAY -->
            <div class="slider-overlay"></div>
            
            <!-- LAYER NR. 1 - Subtitle -->
            <div class="tp-caption tp-resizeme" id="slide-44{{ $key }}-layer-2"
                data-x="['center','center','center','center']"
                data-hoffset="['0','0','0','0']"
                data-y="['middle','middle','middle','middle']"
                data-voffset="['-50','-50','-50','-50']"
                data-fontsize="['20','22','22','20']" data-lineheight="['30','30','25','25']"
                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                data-responsive_offset="on"
                data-frames='[{"delay":270,"speed":1500,"frame":"0","from":"y:[100%];opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 300; color: #ffffff; font-family: 'Poppins', sans-serif;">
                {{ $slider->sub_title }}
            </div>

            <!-- LAYER NR. 2 - Title -->
            <div class="tp-caption tp-resizeme" id="slide-44{{ $key }}-layer-1"
                data-x="['center','center','center','center']"
                data-hoffset="['0','0','0','0']"
                data-y="['middle','middle','middle','middle']"
                data-voffset="['0','0','0','0']"
                data-fontsize="['52','40','42','35']" data-lineheight="['82','82','72','55']"
                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                data-responsive_offset="on"
                data-frames='[{"delay":1080,"speed":1500,"frame":"0","from":"sX:0.8;sY:0.8;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                style="z-index: 6; white-space: nowrap; font-size: 52px; line-height: 82px; font-weight: 500; color: #79a207; font-family: 'Poppins', sans-serif;">
                {{ $slider->title }}
            </div>

            <!-- LAYER NR. 3 - Description -->
            <div class="tp-caption tp-resizeme" id="slide-44{{ $key }}-layer-3"
                data-x="['center','center','center','center']"
                data-hoffset="['0','0','0','0']"
                data-y="['middle','middle','middle','middle']"
                data-voffset="['70','60','70','70']"
                data-fontsize="['16','14','14','14']"
                data-width="['600','600','600','450']"
                data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                data-frames='[{"delay":2400,"speed":1500,"frame":"0","from":"y:[100%];opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                style="z-index: 7; min-width: 600px; max-width: 600px; white-space: normal; font-size: 16px; line-height: 26px; font-weight: 400; color: #fffdfd; font-family: Poppins;">
                {{ $slider->description }}
            </div>

            <!-- LAYER NR. 4 - Button -->
            <div class="tp-caption tp-resizeme" id="slide-44{{ $key }}-layer-4"
                data-x="['center','center','center','center']"
                data-hoffset="['0','0','0','0']"
                data-y="['middle','middle','middle','middle']"
                data-voffset="['138','134','138','150']"
                data-width="['600','600','600','450']"
                data-height="none" data-whitespace="normal"
                data-type="button" data-responsive_offset="on"
                data-frames='[{"delay":3350,"speed":1500,"frame":"0","from":"y:[100%];opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                data-textAlign="['center','center','center','center']"
                style="z-index: 8; font-family: Poppins;">
                <a class="btn web-btn rounded-pill" href="{{ route('product') }}">{{ __('words.shop_now') }}</a>
            </div>
        </li>
    @endforeach
</ul>

                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
        <!--SLIDER DOWN ARROW-->
        <!--    <svg class="separator__svg" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none" fill="#44A36F" version="1.1" xmlns="http://www.w3.org/2000/svg">-->
        <!--        <path d="M 100 100 V 10 L 0 100"/>-->
        <!--        <path d="M 30 73 L 100 18 V 10 Z" fill="#308355" stroke-width="0"/>-->
        <!--    </svg>-->
        <svg id="bigHalfCircle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="60"
            viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 C40 0 60 0 100 100 Z" />
        </svg>
    </div>
</section>
<!--Home End-->