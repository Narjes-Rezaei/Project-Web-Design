        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-6 title-section">
                        <h2 class="heading">Videos</h2>
                    </div>
                    <div class="col-6 text-right">
                        <div class="custom-nav" id="referees">
                            <a href="#" class="js-custom-prev-v2"><span class="icon-keyboard_arrow_left"></span></a>
                            <span></span>
                            <a href="#" class="js-custom-next-v2"><span class="icon-keyboard_arrow_right"></span></a>
                        </div>
                    </div>
                </div>


    <div class="owl-4-slider owl-carousel">

    @foreach($matchVideos as $matchVideo)
        <div class="item">
            <div class="video-media">
                <img src="{{ asset('coverMatchVideo/' . $matchVideo->image) }}" alt="Image" class="img-fluid">
                <a href="{{ $matchVideo->video }}" class="d-flex play-button align-items-center">
                    <span class="icon mr-3">
                        <span class="icon-play"></span>
                    </span>
                    <div class="caption">
                        <h3 class="m-0">{{ $matchVideo->title }}</h3>
                    </div>
                </a>
            </div>
        </div>
    @endforeach

</div>

            </div>
        </div>