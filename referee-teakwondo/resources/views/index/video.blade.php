<style>
    .fixed-video-img {
        width: 300px;
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<div class="site-section" data-aos="fade-up" data-aos-duration="500">
    <div class="container" data-aos="fade-up" data-aos-duration="600">
        <div class="row" data-aos="fade-up" data-aos-duration="700">
            <div class="col-6 title-section" data-aos="fade-right" data-aos-duration="800">
                <h2 class="heading" data-aos="fade-up" data-aos-duration="900">Videos</h2>
            </div>
            <div class="col-6 text-right" data-aos="fade-left" data-aos-duration="800">
                <div class="custom-nav" id="referees" data-aos="fade-up" data-aos-duration="900">
                    <a href="#" class="js-custom-prev-v2"><span class="icon-keyboard_arrow_left"></span></a>
                    <span></span>
                    <a href="#" class="js-custom-next-v2"><span class="icon-keyboard_arrow_right"></span></a>
                </div>
            </div>
        </div>

        <div class="owl-4-slider owl-carousel">
            @foreach($matchVideos as $matchVideo)
            <div class="item" data-aos="zoom-in" data-aos-duration="1000">
                <div class="video-media" data-aos="fade-up" data-aos-duration="1100">
                    <img src="{{ asset('coverMatchVideo/' . $matchVideo->image) }}" alt="Image" class="img-fluid fixed-video-img" data-aos="zoom-in" data-aos-duration="1200">
                    <a href="{{ $matchVideo->video }}" class="d-flex play-button align-items-center" data-aos="fade-up" data-aos-duration="1300">
                        <span class="icon mr-3" data-aos="zoom-in" data-aos-duration="1400">
                            <span class="icon-play"></span>
                        </span>
                        <div class="caption" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="m-0">{{ $matchVideo->title }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
